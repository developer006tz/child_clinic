<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'fathers' => [
        'name' => 'Fathers',
        'index_title' => 'Fathers',
        'new_title' => 'New Father',
        'create_title' => 'Add Father',
        'edit_title' => 'Edit Father',
        'show_title' => 'View Father',
        'inputs' => [
            'name' => 'Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'address' => 'Address',
            'occupation' => 'Occupation',
            'mother_id' => 'Mother',
        ],
    ],

    'pregnants' => [
        'name' => 'Pregnants',
        'index_title' => 'Pregnants',
        'new_title' => 'New Pregnant',
        'create_title' => 'Add Pregnant',
        'edit_title' => 'Edit Pregnant',
        'show_title' => 'View Pregnant',
        'inputs' => [
            'mother_id' => 'Mother',
            'due_date' => 'Due Date',
            'date_of_delivery' => 'Date Of Delivery',
            'time_of_delivery' => 'Time Of Delivery',
            'number_of_weeks_lasted' => 'Number Of Weeks Lasted',
            'weight_at_birth' => 'Weight At Birth',
            'height_at_birth' => 'Height At Birth',
            'gender' => 'Gender',
            'pregnant_defects' => 'Pregnant Defects',
        ],
    ],

    'all_pregnant_complications' => [
        'name' => 'All Pregnant Complications',
        'index_title' => 'Pregnant Complications',
        'new_title' => 'New Pregnant complications',
        'create_title' => 'Add PregnantComplications',
        'edit_title' => 'Edit PregnantComplications',
        'show_title' => 'View PregnantComplications',
        'inputs' => [
            'pregnant_id' => 'Pregnant',
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'babies' => [
        'name' => 'Babies',
        'index_title' => 'Babies',
        'new_title' => 'New Baby',
        'create_title' => 'Add Baby',
        'edit_title' => 'Edit Baby',
        'show_title' => 'View Baby',
        'inputs' => [
            'name' => 'Name',
            'gender' => 'Gender',
            'birthdate' => 'Birthdate',
            'weight_at_birth' => 'weight At Birth',
            'height_at_birth' => 'height At Birth',
            'head_circumference' => 'head circumference',
            'mother_id' => 'Mother',
            'father_id' => 'Father',
        ],
    ],

    'baby_development_milestones' => [
        'name' => 'Baby Development Milestones',
        'index_title' => 'Babies Development Milestones',
        'new_title' => 'New Baby development milestone',
        'create_title' => 'Add BabyDevelopment Milestone',
        'edit_title' => 'Edit BabyDevelopment Milestone',
        'show_title' => 'View BabyDevelopment Milestone',
        'inputs' => [
            'baby_id' => 'Baby',
            'first_smile' => 'First Smile',
            'first_word' => 'First Word',
            'first_step' => 'First Step',
        ],
    ],

    'baby_medical_hostories' => [
        'name' => 'Baby Medical Hostories',
        'index_title' => 'Babies Medical Hostories',
        'new_title' => 'New Baby medical hostory',
        'create_title' => 'Add Baby MedicalHostory',
        'edit_title' => 'Edit Baby MedicalHostory',
        'show_title' => 'View Baby MedicalHostory',
        'inputs' => [
            'desease_id' => 'Desease',
            'level_of_illness' => 'Level Of Illness',
            'description' => 'Description',
            'date' => 'Date',
        ],
    ],

    'baby_progress_health_reports' => [
        'name' => 'Baby Progress Health Reports',
        'index_title' => 'Baby Progress Health Reports',
        'new_title' => 'New Baby progress health report',
        'create_title' => 'Add Baby Progress HealthReport',
        'edit_title' => 'Edit Baby Progress HealthReport',
        'show_title' => 'View Baby Progress HealthReport',
        'inputs' => [
            'age_per_month'=> 'Age per Month',
            'baby_id' => 'Baby',
            'height' => 'Height',
            'weight' => 'Weight',
            'head_circumference' => 'Head Circumference',
            'bmi' => 'Bmi',
        ],
    ],

    'baby_vaccinations' => [
        'name' => 'Baby Vaccinations',
        'index_title' => 'BabyVaccinations',
        'new_title' => 'New Baby vaccination',
        'create_title' => 'Add BabyVaccination',
        'edit_title' => 'Edit BabyVaccination',
        'show_title' => 'View BabyVaccination',
        'inputs' => [
            'baby_id' => 'Baby',
            'vacination_id' => 'Vacination',
            'date_of_vaccine' => 'Date Of Vaccine',
            'reaction_occured' => 'Reaction Occured',
            'is_vaccinated' => 'Is Vaccinated',
        ],
    ],

    'cards' => [
        'name' => 'Cards',
        'index_title' => 'Cards',
        'new_title' => 'New Card',
        'create_title' => 'Add Card',
        'edit_title' => 'Edit Card',
        'show_title' => 'View Card',
        'inputs' => [
            'baby_id' => 'Baby',
            'issue_number' => 'Issue Number',
            'weight' => 'Weight',
            'height' => 'Height',
            'head_circumference' => 'Head Circumference',
            'apgar_score' => 'Apgar Score',
            'birth_defects' => 'Birth Defects',
            'blood_type_id' => 'Blood Type',
        ],
    ],

    'vacinations' => [
        'name' => 'Vacinations',
        'index_title' => 'Vacinations',
        'new_title' => 'New Vacination',
        'create_title' => 'Add Vacination',
        'edit_title' => 'Edit Vacination',
        'show_title' => 'View Vacination',
        'inputs' => [
            'name' => 'Name',
            'type' => 'Type',
        ],
    ],

    'prenatal_apointments' => [
        'name' => 'Prenatal Apointments',
        'index_title' => 'PrenatalApointments',
        'new_title' => 'New Prenatal apointment',
        'create_title' => 'Add PrenatalApointment',
        'edit_title' => 'Edit PrenatalApointment',
        'show_title' => 'View PrenatalApointment',
        'inputs' => [
            'pregnant_id' => 'Pregnant',
            'date' => 'Date',
            'time' => 'Time',
        ],
    ],

    'blood_types' => [
        'name' => 'Blood Types',
        'index_title' => 'BloodTypes',
        'new_title' => 'New Blood type',
        'create_title' => 'Add BloodType',
        'edit_title' => 'Edit BloodType',
        'show_title' => 'View BloodType',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'rh_factor' => 'Rh Factor',
        ],
    ],

    'clinics' => [
        'name' => 'Clinics',
        'index_title' => 'Clinics',
        'new_title' => 'New Clinic',
        'create_title' => 'Add Clinic',
        'edit_title' => 'Edit Clinic',
        'show_title' => 'View Clinic',
        'inputs' => [
            'name' => 'Name',
            'location' => 'Location',
            'registration_number' => 'Registration Number',
        ],
    ],

    'mother_medical_histories' => [
        'name' => 'Mother Medical Histories',
        'index_title' => 'MotherMedicalHistories',
        'new_title' => 'New Mother medical history',
        'create_title' => 'Add Mother Medical History',
        'edit_title' => 'Edit Mother Medical History',
        'show_title' => 'View Mother Medical History',
        'inputs' => [
            'mother_id' => 'Mother',
            'illnes' => 'Illnes',
            'Description' => 'Description',
            'date' => 'Date',
            'status' => 'Status',
        ],
    ],

    'mother_health_statuses' => [
        'name' => 'Mother Health Statuses',
        'index_title' => 'Mother Health Statuses',
        'new_title' => 'New Mother health status',
        'create_title' => 'Add Mother Health Status',
        'edit_title' => 'Edit MotherHealthStatus',
        'show_title' => 'View MotherHealthStatus',
        'inputs' => [
            'mother_id' => 'Mother',
            'height' => 'Height',
            'weight' => 'Weight',
            'hiv_status' => 'Hiv Status',
            'desease_id' => 'Desease',
            'health_status' => 'Health Status',
        ],
    ],

    'birth_certificates' => [
        'name' => 'Birth Certificates',
        'index_title' => 'BirthCertificates',
        'new_title' => 'New Birth certificate',
        'create_title' => 'Add Birth Certificate',
        'edit_title' => 'Edit BirthCertificate',
        'show_title' => 'View BirthCertificate',
        'inputs' => [
            'baby_id' => 'Baby',
            'date_of_birth' => 'Date Of Birth',
            'Hospital' => 'Hospital',
            'mother_id' => 'Mother',
            'father_id' => 'Father',
            'father_ocupation' => 'Father Ocupation',
            'Mother_ocupation' => 'Mother Ocupation',
            'father_address' => 'Father Address',
            'Mother_address' => 'Mother Address',
        ],
    ],

    'deseases' => [
        'name' => 'Deseases',
        'index_title' => 'Deseases',
        'new_title' => 'New Desease',
        'create_title' => 'Add Desease',
        'edit_title' => 'Edit Desease',
        'show_title' => 'View Desease',
        'inputs' => [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
        ],
    ],

    'insurances' => [
        'name' => 'Insurances',
        'index_title' => 'Insurances',
        'new_title' => 'New Insurance',
        'create_title' => 'Add Insurance',
        'edit_title' => 'Edit Insurance',
        'show_title' => 'View Insurance',
        'inputs' => [
            'provider_name' => 'Provider Name',
            'insurance_name' => 'Insurance Name',
            'policy_number' => 'Policy Number',
            'contact' => 'Contact',
        ],
    ],

    'message_templates' => [
        'name' => 'Message Templates',
        'index_title' => 'MessageTemplates',
        'new_title' => 'New Message template',
        'create_title' => 'Add Message Template',
        'edit_title' => 'Edit MessageTemplate',
        'show_title' => 'View MessageTemplate',
        'inputs' => [
            'name' => 'Name',
            'body' => 'Body',
        ],
    ],

    'all_compose_sms' => [
        'name' => 'All Compose Sms',
        'index_title' => 'Compose Sms',
        'new_title' => 'New Compose sms',
        'create_title' => 'Add ComposeSms',
        'edit_title' => 'Edit ComposeSms',
        'show_title' => 'View ComposeSms',
        'inputs' => [
            'message_template_id' => 'Message Template',
            'custom_message' => 'Custom Message',
        ],
    ],

    'schedules' => [
        'name' => 'Schedules',
        'index_title' => 'Schedules',
        'new_title' => 'New Schedule',
        'create_title' => 'Add Schedule',
        'edit_title' => 'Edit Schedule',
        'show_title' => 'View Schedule',
        'inputs' => [
            'name' => 'Name',
            'message' => 'Message',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
        ],
    ],

    'all_sms' => [
        'name' => 'All Sms',
        'index_title' => 'AllSms',
        'new_title' => 'New Sms',
        'create_title' => 'Add Sms',
        'edit_title' => 'Edit Sms',
        'show_title' => 'View Sms',
        'inputs' => [
            'body' => 'Body',
            'phone' => 'Phone',
            'status' => 'Status',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users',
        'new_title' => 'New User',
        'create_title' => 'Add User',
        'edit_title' => 'Edit User',
        'show_title' => 'View User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'clinic_id' => 'Clinic',
            'password' => 'Password',
        ],
    ],

    'mothers' => [
        'name' => 'Mothers',
        'index_title' => 'Mothers',
        'new_title' => 'New Mother',
        'create_title' => 'Add Mother',
        'edit_title' => 'Edit Mother',
        'show_title' => 'View Mother',
        'inputs' => [
            'clinic_id' => 'Clinic Id',
            'name' => 'Name',
            'blood_type_id' => 'Blood Type',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'address' => 'Address',
            'insurance_info' => 'Insurance Info',
            'occupation' => 'Occupation',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles',
        'create_title' => 'Add Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'View Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions',
        'create_title' => 'Add Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'View Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];