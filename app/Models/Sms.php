<?php

namespace App\Models;


use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Sms extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['body', 'phone', 'status'];

    protected $searchableFields = ['*'];

    public function sendScheduleMessages()
{
    // Get all mothers with their associated pregnancies and registered babies
    $mothers = Mother::with('pregnants.prenatalApointments', 'babies')
        ->whereHas('pregnants.prenatalApointments', function ($query) {
            // Filter mothers based on specific conditions for prenatal appointments
            $query->where('date', '>=', now()->startOfDay())
                ->where('date', '<=', now()->addWeeks(2)->endOfDay());
        })
        ->orWhereHas('babies', function ($query) {
            // Filter mothers based on specific conditions for registered babies
            $query->whereHas('babyDevelopmentMilestones', function ($query) {
                $query->where('date', '>=', now()->startOfDay())
                    ->where('date', '<=', now()->addWeeks(2)->endOfDay());
            });
        })
        ->get();

    // Iterate over the mothers and send schedule messages
    foreach ($mothers as $mother) {
        // Generate the message content based on the schedule
        $message = $this->generateScheduleMessage($mother);

        // Send the message to the mother's phone number
        $this->sendMessage($message, $mother->phone);
    }
}


    private function generateScheduleMessage($mother)
    {
        $message = "Dear " . $mother->name . ",\n";
        $message .= "You have an upcoming schedule at the clinic:\n\n";

        // Check if the mother has any associated pregnancies
        if ($mother->pregnants->isNotEmpty()) {
            $message .= "Pregnancy Appointments:\n";
            foreach ($mother->pregnants as $pregnant) {
                foreach ($pregnant->prenatalApointments as $appointment) {
                    $message .= "Date: " . $appointment->date->format('Y-m-d') . "\n";
                    $message .= "Time: " . $appointment->time . "\n";
                    $message .= "------------------------------------\n";
                }
            }
        }

        // Check if the mother has any registered babies
        if ($mother->babies->isNotEmpty()) {
            $message .= "Baby Appointments:\n";
            foreach ($mother->babies as $baby) {
                // Retrieve the baby's scheduled appointments or milestones
                $appointments = $baby->babyDevelopmentMilestones;

                foreach ($appointments as $appointment) {
                    $message .= "Date: " . $appointment->date->format('Y-m-d') . "\n";
                    $message .= "Time: " . $appointment->time . "\n";
                    $message .= "Milestone: " . $appointment->milestone . "\n";
                    $message .= "------------------------------------\n";
                }
            }
        }

        return $message;
    }

    private function sendMessage($message, $phone)
    {
        // Implement your logic to send the SMS message
        // Use your preferred SMS gateway or service to send the message to the provided phone number

        // In this example, we'll simply output the message for demonstration purposes
        echo "Sending SMS to $phone:\n";
        echo $message . "\n";
    }
}
