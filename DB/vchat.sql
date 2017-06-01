/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.24 : Database - voicechat_2_0
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `applicationsettings` */

CREATE TABLE `applicationsettings` (
  `pName` varchar(50) DEFAULT NULL,
  `pValue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `barlist` */

CREATE TABLE `barlist` (
  `ID` bigint(20) DEFAULT NULL,
  `chatid` varchar(50) DEFAULT NULL,
  `CalltimeID` varchar(50) DEFAULT NULL,
  `writeTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bartimedef` */

CREATE TABLE `bartimedef` (
  `ID` int(11) DEFAULT NULL,
  `CalltimeID` varchar(50) DEFAULT NULL,
  `startmin` int(11) DEFAULT NULL,
  `endmin` int(11) DEFAULT NULL,
  `prompt` varchar(255) DEFAULT NULL,
  `unbarrprompt` varchar(255) DEFAULT NULL,
  `WriteTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `blocklist` */

CREATE TABLE `blocklist` (
  `ChatID` varchar(50) DEFAULT NULL,
  `BlockedChatID` varchar(50) DEFAULT NULL,
  `BlockTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` char(10) DEFAULT NULL,
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Table structure for table `cgw_data_reg` */

CREATE TABLE `cgw_data_reg` (
  `msisdn` varchar(11) DEFAULT NULL,
  `serviceid` varchar(100) DEFAULT NULL,
  `status_changing` varchar(50) DEFAULT NULL,
  `NextRenewalDate` datetime DEFAULT NULL,
  KEY `msisdn` (`msisdn`,`serviceid`,`NextRenewalDate`,`status_changing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `complaint_box` */

CREATE TABLE `complaint_box` (
  `ChatID` varchar(50) DEFAULT NULL,
  `ComplaintChatID` varchar(50) DEFAULT NULL,
  `ComplaintTime` datetime NOT NULL,
  `Status` char(10) DEFAULT NULL,
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `dostinbox` */

CREATE TABLE `dostinbox` (
  `ReciverNo` varchar(50) DEFAULT NULL,
  `OffMsg` varchar(255) DEFAULT NULL,
  `OffSong` varchar(255) DEFAULT NULL,
  `SenderNo` varchar(50) DEFAULT NULL,
  `SentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SenderId` varchar(50) DEFAULT NULL,
  `NickFile` varchar(255) DEFAULT NULL,
  `ListenStatus` varchar(50) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154409 DEFAULT CHARSET=latin1;

/*Table structure for table `dostlist` */

CREATE TABLE `dostlist` (
  `Mobileno` varchar(50) DEFAULT NULL,
  `DostID` bigint(20) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `NickFile` varchar(255) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `ShortProfile` varchar(255) DEFAULT NULL,
  `outtime` bigint(20) DEFAULT NULL,
  `intime` bigint(20) DEFAULT NULL,
  `RegDate` datetime DEFAULT NULL,
  `LogStatus` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `OriginalRegdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `BusyStatus` int(11) DEFAULT NULL,
  `popularity` bigint(20) DEFAULT NULL,
  `LoginTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LogOutTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `GroupID` int(11) DEFAULT NULL,
  `DeregDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `serviceid` varchar(100) DEFAULT NULL,
  `dereg_chanel` varchar(100) DEFAULT NULL,
  `reg_chanel` varchar(100) DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  KEY `Mobileno` (`Mobileno`),
  KEY `DostID` (`DostID`),
  KEY `Gender` (`Gender`),
  KEY `Age` (`Age`),
  KEY `NickFile` (`NickFile`),
  KEY `Status` (`Status`),
  KEY `expired_date` (`expired_date`),
  KEY `reg_chanel` (`reg_chanel`),
  KEY `serviceid` (`serviceid`),
  KEY `dereg_chanel` (`dereg_chanel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `duplicate_tbl` */

CREATE TABLE `duplicate_tbl` (
  `msisdn` varchar(11) DEFAULT NULL,
  `count_reg` varchar(11) DEFAULT NULL,
  `dostid_max` varchar(19) DEFAULT NULL,
  `status_process` varchar(50) DEFAULT 'que',
  `serviceid` varchar(100) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `friendsnickposition` */

CREATE TABLE `friendsnickposition` (
  `ano` varchar(50) DEFAULT NULL,
  `propertyname` varchar(50) DEFAULT NULL,
  `propertyvalue` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `gender` */

CREATE TABLE `gender` (
  `id` bigint(20) DEFAULT NULL,
  `GenderName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `logtable` */

CREATE TABLE `logtable` (
  `logtext` text,
  `logtime` datetime DEFAULT NULL,
  `msisdn` text,
  `userType` text,
  `action` text,
  `valueArray` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `manual_deregistered` */

CREATE TABLE `manual_deregistered` (
  `date_op` datetime DEFAULT NULL,
  `msisdn` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `recentcalledlist` */

CREATE TABLE `recentcalledlist` (
  `callerid` bigint(20) DEFAULT NULL,
  `calledid` bigint(20) DEFAULT NULL,
  `calledtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271730 DEFAULT CHARSET=latin1;

/*Table structure for table `sdp_history` */

CREATE TABLE `sdp_history` (
  `Mobileno` varchar(150) DEFAULT NULL,
  `package_id` varchar(765) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DeregDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `subscriberservices` */

CREATE TABLE `subscriberservices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RegistrationDate` datetime DEFAULT NULL,
  `NextRenewalDate` datetime DEFAULT NULL,
  `ChargingDueDate` datetime DEFAULT NULL,
  `DowngradedSubscriptionGroupID` varchar(50) DEFAULT NULL,
  `DeregistrationDate` datetime DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `SubscriptionGroupID` varchar(50) DEFAULT NULL,
  `NextNotificationDate` datetime DEFAULT NULL,
  `UserID` varchar(50) DEFAULT NULL,
  `Channel` varchar(50) DEFAULT 'ivr',
  `LastUpdate` datetime DEFAULT NULL,
  `available_balance` int(11) DEFAULT '-1',
  `Dereg_Channel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `msisdn,status,group` (`msisdn`,`Status`,`SubscriptionGroupID`),
  KEY `ChargingDueDate,status,group` (`Status`,`ChargingDueDate`,`SubscriptionGroupID`),
  KEY `Status,group,notificationdate` (`Status`,`SubscriptionGroupID`,`NextNotificationDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbl_dereg_due_to_non_auto_renew` */

CREATE TABLE `tbl_dereg_due_to_non_auto_renew` (
  `msisdn` varchar(11) DEFAULT NULL,
  `serviceid` varchar(100) DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `status_changing` varchar(50) DEFAULT 'que',
  `DostID` varchar(19) DEFAULT NULL,
  KEY `msisdn` (`msisdn`,`serviceid`,`expired_date`,`status_changing`,`DostID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbl_question` */

CREATE TABLE `tbl_question` (
  `question_id` bigint(20) NOT NULL,
  `question_description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbl_user_answer` */

CREATE TABLE `tbl_user_answer` (
  `msisdn` varchar(20) DEFAULT NULL,
  `answer_id` bigint(20) DEFAULT NULL,
  `lastUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tempdostlist` */

CREATE TABLE `tempdostlist` (
  `Mobileno` varchar(50) NOT NULL,
  `DostID` bigint(20) NOT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `NickFile` varchar(2000) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `ShortProfile` varchar(2000) DEFAULT NULL,
  `outtime` bigint(20) DEFAULT NULL,
  `intime` bigint(20) DEFAULT NULL,
  `RegDate` datetime DEFAULT NULL,
  `LogStatus` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `OriginalRegdate` datetime DEFAULT NULL,
  `BusyStatus` int(11) NOT NULL DEFAULT '0',
  `popularity` bigint(20) NOT NULL DEFAULT '10',
  `LoginTime` datetime DEFAULT NULL,
  `LogoutTime` datetime DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `DeregDate` datetime DEFAULT NULL,
  PRIMARY KEY (`DostID`),
  KEY `Mobileno` (`Mobileno`),
  KEY `LogoutTime` (`LogoutTime`),
  KEY `BusyStatus` (`BusyStatus`),
  KEY `LoginTime` (`LoginTime`),
  KEY `OriginalRegdate` (`OriginalRegdate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `test` */

CREATE TABLE `test` (
  `ID` int(8) DEFAULT NULL,
  `NickFile` varchar(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `user` */

CREATE TABLE `user` (
  `UserID` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(50) DEFAULT NULL,
  `LastModifiedID` varchar(100) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Trigger structure for table `dostlist` */

DELIMITER $$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'%' */ /*!50003 TRIGGER `Tempdostlistinsert` AFTER INSERT ON `dostlist` FOR EACH ROW BEGIN
INSERT INTO tempdostlist(DostID,Mobileno,Gender,Age,NickFile,Location,ShortProfile,outtime,intime,RegDate,LogStatus,`Status`,OriginalRegdate,BusyStatus,popularity,LoginTime,LogOutTime,GroupID,DeregDate)
				   VALUES(new.DostID,new.Mobileno,new.Gender,new.Age,new.NickFile,new.Location,new.ShortProfile,new.outtime,new.intime,new.RegDate,new.LogStatus,new.`Status`,new.OriginalRegdate,new.BusyStatus,new.popularity,new.LoginTime,new.LogOutTime,new.GroupID,new.DeregDate);
END */$$


DELIMITER ;

/* Procedure structure for procedure `pr_deregister_voice_chat` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` PROCEDURE `pr_deregister_voice_chat`( IN p_msisdn VARCHAR(10) )
BEGIN
    
     delete from tempdostlist where Mobileno = p_msisdn and `Status`  = '1' ;
	 
 
     update dostlist set `Status` = '0' , DeregDate =NOW() where Mobileno=p_msisdn and `Status` = '1'  ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `pr_do_dereg_Non_auto_renew` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_do_dereg_Non_auto_renew`()
BEGIN
    
    INSERT INTO tbl_dereg_due_to_non_auto_renew 	
    SELECT t.Mobileno,t.serviceid,t.expired_date,'que',t.DostID FROM  dostlist t 	
	WHERE (t.expired_date<NOW() OR IFNULL(t.expired_date,'2000-01-05 00:01:00')='2000-01-05 00:01:00') 
	AND t.status=1 ;
	
	update dostlist t 
	inner join tbl_dereg_due_to_non_auto_renew  d on d.msisdn=t.Mobileno and d.DostID=t.DostID and d.status_changing='que' and t.status=1
	set t.status=0
	,d.status_changing='dereg_fromservicedatabase'
	,t.dereg_chanel='ivr_non_autorenew'
	,t.DeregDate=now();
	
	DELETE FROM tempdostlist WHERE DostID IN  (SELECT DostID FROM dostlist  WHERE STATUS=0 );
	
	SELECT 	msisdn, 
	serviceid, 
	expired_date, 
	status_changing	 
	FROM tbl_dereg_due_to_non_auto_renew  WHERE status_changing='dereg_fromservicedatabase' AND IFNULL(serviceid,'abc')<>'abc' ;
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `pr_insert_update_dost_table` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_insert_update_dost_table`(IN p_msisdn VARCHAR(10)
					,IN p_serviceid VARCHAR(100) )
BEGIN
SELECT COUNT(*) , IFNULL(MAX(DostID),0) INTO @registered_Mobileno , @chat_id   FROM dostlist WHERE Mobileno = p_msisdn ;
-- SELECT @registered_Mobileno ,@chat_id  ;
IF (@registered_Mobileno<1) THEN
	SELECT MAX(DostID) INTO @DostID FROM dostlist WHERE  dostid LIKE '1%' AND CHARACTER_LENGTH(dostid)='9'	;
	-- SELECT @DostID ;
	
	IF ( @DostID = "" || @DostID IS  NULL ) THEN
	 SET @DostID='100000';
	
	END IF; 
	
	INSERT INTO dostlist(DostID,Mobileno,Gender,Age,NickFile,ShortProfile,RegDate,OriginalRegdate,popularity,Location,STATUS,BusyStatus,LoginTime ,serviceid,reg_chanel ,expired_date) 
	 VALUES(@DostID +1 ,p_msisdn,'1','1','','',NOW(),NOW(),'10','','1','1',NOW(),ifnull(p_serviceid,'VoiceChatDaily') ,'ivr', CASE WHEN p_serviceid='VoiceChatDaily' THEN DATE_ADD(NOW(),INTERVAL 1 DAY )
		WHEN p_serviceid='VoiceChatWeekly' THEN DATE_ADD(NOW(),INTERVAL 7 DAY )
		WHEN p_serviceid='VoiceChatBiWeekly' THEN DATE_ADD(NOW(),INTERVAL 14 DAY )
		WHEN p_serviceid='VoiceChatMonthly' THEN DATE_ADD(NOW(),INTERVAL 1 MONTH )
		ELSE DATE_ADD(NOW(),INTERVAL 1 DAY ) 
		END); 	
	
	/*select @DostID,'p_msisdn','1','1','','',NOW(),NOW(),'10','','1','1',NOW(),p_serviceid ,	
		CASE WHEN p_serviceid='VoiceChatDaily' THEN DATE_ADD(NOW(),INTERVAL 1 DAY )
		WHEN p_serviceid='VoiceChatWeekly' THEN DATE_ADD(NOW(),INTERVAL 7 DAY )
		WHEN p_serviceid='VoiceChatBiWeekly' THEN DATE_ADD(NOW(),INTERVAL 14 DAY )
		WHEN p_serviceid='VoiceChatMonthly' THEN DATE_ADD(NOW(),INTERVAL 1 MONTH )
		else DATE_ADD(NOW(),INTERVAL 1 DAY ) 
		END	as expired_date ; */	
		
ELSE 
SELECT  STATUS INTO @STATUS  FROM dostlist WHERE Mobileno = p_msisdn  AND DostID=@chat_id;
	 IF (@STATUS=0) THEN 
	  UPDATE dostlist SET STATUS=1,
			  expired_date=   CASE WHEN p_serviceid='VoiceChatDaily' THEN DATE_ADD(NOW(),INTERVAL 1 DAY )
			WHEN p_serviceid='VoiceChatWeekly' THEN DATE_ADD(NOW(),INTERVAL 7 DAY )
			WHEN p_serviceid='VoiceChatBiWeekly' THEN DATE_ADD(NOW(),INTERVAL 14 DAY )
			WHEN p_serviceid='VoiceChatMonthly' THEN DATE_ADD(NOW(),INTERVAL 1 MONTH )
			ELSE DATE_ADD(NOW(),INTERVAL 1 DAY ) END ,
			serviceid=IFNULL(p_serviceid,'VoiceChatDaily'),
			RegDate=NOW()
			WHERE Mobileno = p_msisdn AND DostID = @chat_id ;
			
	  INSERT INTO tempdostlist(DostID,Mobileno,Gender,Age,NickFile,Location,ShortProfile,outtime,intime,RegDate,LogStatus,`Status`,OriginalRegdate,BusyStatus,popularity,LoginTime,LogOutTime,GroupID,DeregDate)
		SELECT DostID,Mobileno,Gender,Age,NickFile,Location,ShortProfile,outtime,intime,RegDate,LogStatus,`Status`,
		OriginalRegdate,BusyStatus,popularity,LoginTime,LogOutTime,GroupID,DeregDate FROM dostlist WHERE Mobileno = p_msisdn AND DostID = @chat_id ;
	  		
			
	  ELSEIF (@STATUS=1) THEN 
	    UPDATE dostlist SET 
			  expired_date =   CASE WHEN p_serviceid='VoiceChatDaily' THEN DATE_ADD(NOW(),INTERVAL 1 DAY )
			WHEN p_serviceid='VoiceChatWeekly' THEN DATE_ADD(NOW(),INTERVAL 7 DAY )
			WHEN p_serviceid='VoiceChatBiWeekly' THEN DATE_ADD(NOW(),INTERVAL 14 DAY )
			WHEN p_serviceid='VoiceChatMonthly' THEN DATE_ADD(NOW(),INTERVAL 1 MONTH )
			ELSE DATE_ADD(NOW(),INTERVAL 1 DAY ) END ,
			serviceid=IFNULL(p_serviceid,'VoiceChatDaily')	,
			RegDate=NOW()	
			WHERE Mobileno = p_msisdn AND DostID = @chat_id ;
	  
	  END IF; 	
	  
		 
	
	IF (@registered_Mobileno>1) THEN 
	  
	  INSERT INTO duplicate_tbl (msisdn, count_reg,	dostid_max,status_process, serviceid )	 
	  SELECT p_msisdn,@registered_Mobileno,@chat_id,'que',p_serviceid;
	 
	 END IF;   
END IF; 
   
 
    END */$$
DELIMITER ;

/* Procedure structure for procedure `pr_make_free` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` PROCEDURE `pr_make_free`(in P_mobileno VARCHAR(50) )
BEGIN
    
--    $qry="
    update tempdostlist set BusyStatus =0,LogoutTime =NOW() where mobileno=P_mobileno and Status='1' ;			 	
-- $rs = Sql_exec($cn,$qry);
-- $qry1=" 
-- INSERT INTO test.`processlist_voicechat_2_0_tracing` (`ID`) 
-- VALUES( P_mobileno  );-- ";
-- $rs = Sql_exec($cn,$qry1);
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
