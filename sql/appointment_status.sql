 DELETE FROM `list_options` WHERE `list_id` = 'apptstat';

INSERT INTO list_options ( list_id, option_id, title, seq, is_default ) VALUES ('lists'   ,'apptstat','Appointment Statuses', 1,0);
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','-','- None/Unknown'        ,10,0,'FEFDCF|0','unknown');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','^','^ Pending'             ,20,0,'FEFDCF|0','pending');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','*','* Booked'              ,30,0,'FFC9F8|0','booked');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','*','* Available'           ,40,0,'FFC9F8|0','available');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping, toggle_setting_1 ) VALUES ('apptstat','@','@ Available',40,0,'FF2414|10','ptinroom','1');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping, toggle_setting_1 ) VALUES ('apptstat','~','~ Available late',45,0,'FF6619|10',,'ptinroom','1');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','<','< Dr In Call',50,0,'52D9DE|10','incall');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping, toggle_setting_2 ) VALUES ('apptstat','>','> Fulfilled',60,0,'FEFDCF|0','fulfilled','1');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','$','$ Paid',70,0,'C0FF96|0','paid');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','x','x Canceled'            ,100,0,'BFBFBF|0','cancelled');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','%','% Canceled < 24h',110,0,'BFBFBF|0','cancelled');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping, toggle_setting_2 ) VALUES ('apptstat','!','! Left w/o visit',120,0,'0BBA34|0','cancelled','1');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','?','? No show'             ,130,0,'BFBFBF|0','noshow');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','#','# Ins/fin issue',140,0,'FFFF2B|0','unknown');
INSERT INTO list_options ( list_id, option_id, title, seq, is_default, notes, mapping ) VALUES ('apptstat','+','+ Chart pulled'        ,150,0,'87FF1F|0','unknown');


-- old status
--! Left w/o visit
--# Ins/fin issue
--$ Coding done
--% Canceled < 24h
--* Reminder done
--+ Chart pulled
--- None
--< In exam room
--> Checked out
--? No show
--@ Arrived
--x Canceled
--~ Arrived late