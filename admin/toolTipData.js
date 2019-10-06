var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// patients table
patients_addTip=["",spacer+"This option allows all members of the group to add records to the 'Patients' table. A member who adds a record to the table becomes the 'owner' of that record."];

patients_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Patients' table."];
patients_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Patients' table."];
patients_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Patients' table."];
patients_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Patients' table."];

patients_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Patients' table."];
patients_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Patients' table."];
patients_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Patients' table."];
patients_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Patients' table, regardless of their owner."];

patients_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Patients' table."];
patients_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Patients' table."];
patients_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Patients' table."];
patients_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Patients' table."];

// disease_symptoms table
disease_symptoms_addTip=["",spacer+"This option allows all members of the group to add records to the 'Disease symptoms' table. A member who adds a record to the table becomes the 'owner' of that record."];

disease_symptoms_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Disease symptoms' table."];
disease_symptoms_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Disease symptoms' table."];
disease_symptoms_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Disease symptoms' table."];
disease_symptoms_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Disease symptoms' table."];

disease_symptoms_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Disease symptoms' table."];
disease_symptoms_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Disease symptoms' table."];
disease_symptoms_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Disease symptoms' table."];
disease_symptoms_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Disease symptoms' table, regardless of their owner."];

disease_symptoms_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Disease symptoms' table."];
disease_symptoms_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Disease symptoms' table."];
disease_symptoms_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Disease symptoms' table."];
disease_symptoms_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Disease symptoms' table."];

// medical_records table
medical_records_addTip=["",spacer+"This option allows all members of the group to add records to the 'Medical Records' table. A member who adds a record to the table becomes the 'owner' of that record."];

medical_records_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Medical Records' table."];
medical_records_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Medical Records' table."];
medical_records_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Medical Records' table."];
medical_records_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Medical Records' table."];

medical_records_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Medical Records' table."];
medical_records_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Medical Records' table."];
medical_records_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Medical Records' table."];
medical_records_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Medical Records' table, regardless of their owner."];

medical_records_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Medical Records' table."];
medical_records_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Medical Records' table."];
medical_records_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Medical Records' table."];
medical_records_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Medical Records' table."];

// events table
events_addTip=["",spacer+"This option allows all members of the group to add records to the 'Appointments' table. A member who adds a record to the table becomes the 'owner' of that record."];

events_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Appointments' table."];
events_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Appointments' table."];
events_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Appointments' table."];
events_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Appointments' table."];

events_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Appointments' table."];
events_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Appointments' table."];
events_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Appointments' table."];
events_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Appointments' table, regardless of their owner."];

events_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Appointments' table."];
events_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Appointments' table."];
events_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Appointments' table."];
events_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Appointments' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
