CREATE TABLE `SlackURL` (
	`email id` varchar NOT NULL,
	`Full name` varchar NOT NULL,
	`Display name` varchar NOT NULL,
	`password` varchar NOT NULL,
	`Question 1(why slack?)` varchar NOT NULL,
	`Q2` varchar NOT NULL,
	`Q3` varchar NOT NULL,
	`Q4(Are u manager?)` varchar NOT NULL,
	`Group name` varchar NOT NULL,
	`workspace URL` varchar NOT NULL,
	PRIMARY KEY (`workspace URL`)
);

CREATE TABLE `Invited Users` (
	`email id` varchar NOT NULL,
	`full name` varchar NOT NULL,
	`display name` varchar NOT NULL,
	`password` varchar NOT NULL,
	`work space URL` varchar NOT NULL,
	`What I do (Q)` varchar NOT NULL,
	`status` varchar NOT NULL,
	`phone number` varchar NOT NULL,
	`Time zone` varchar NOT NULL,
	`User ID` varchar NOT NULL AUTO_INCREMENT,
	`skype-Id` varchar NOT NULL,
	`picture` blob NOT NULL,
	`Mode` varchar NOT NULL
);

CREATE TABLE `Channels` (
	`Channel name` varchar NOT NULL,
	`work space URL` varchar NOT NULL,
	`Privacy setting` varchar NOT NULL,
	`Channel Id` varchar NOT NULL AUTO_INCREMENT,
	`Purpose` varchar NOT NULL,
	`User Id` varchar NOT NULL,
	PRIMARY KEY (`Channel Id`)
);

CREATE TABLE `Channel Users` (
	`Channel Id` varchar NOT NULL,
	`User ID` varchar NOT NULL
);

CREATE TABLE `emoji's table` (
	`emoji Id` varchar NOT NULL,
	`Emoji's` varchar NOT NULL,
	PRIMARY KEY (`emoji Id`)
);

CREATE TABLE `Messages` (
	`Message Id` varchar NOT NULL AUTO_INCREMENT,
	`Channel Id` varchar NOT NULL,
	`User Id` varchar NOT NULL,
	`Message` varchar NOT NULL,
	`Timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (`Message Id`)
);

CREATE TABLE `Reactions` (
	`Message Id` varchar NOT NULL,
	`Reaction` varchar NOT NULL,
	`User Id` varchar NOT NULL
);

CREATE TABLE `Thread ` (
	`Message Id` varchar NOT NULL,
	`Thread ID` varchar NOT NULL AUTO_INCREMENT,
	`Message` varchar NOT NULL,
	`User Id` varchar NOT NULL,
	`time` varchar NOT NULL,
	PRIMARY KEY (`Thread ID`)
);

CREATE TABLE `Thread Reactions` (
	`Thread Id` varchar NOT NULL,
	`Reaction` varchar NOT NULL,
	`User ID` varchar NOT NULL
);

CREATE TABLE `Direct Messages` (
	`message Id` varchar NOT NULL AUTO_INCREMENT,
	`from_user_id` varchar NOT NULL,
	`to_user_id` varchar NOT NULL,
	`Message` varchar NOT NULL,
	`Timestamp` TIMESTAMP NOT NULL,
	`workspace URL` TIMESTAMP NOT NULL,
	PRIMARY KEY (`message Id`)
);

ALTER TABLE `Invited Users` ADD CONSTRAINT `Invited Users_fk0` FOREIGN KEY (`work space URL`) REFERENCES `SlackURL`(`workspace URL`);

ALTER TABLE `Channels` ADD CONSTRAINT `Channels_fk0` FOREIGN KEY (`work space URL`) REFERENCES `SlackURL`(`workspace URL`);

ALTER TABLE `Channels` ADD CONSTRAINT `Channels_fk1` FOREIGN KEY (`User Id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Channel Users` ADD CONSTRAINT `Channel Users_fk0` FOREIGN KEY (`Channel Id`) REFERENCES `Channels`(`Channel Id`);

ALTER TABLE `Channel Users` ADD CONSTRAINT `Channel Users_fk1` FOREIGN KEY (`User ID`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Messages` ADD CONSTRAINT `Messages_fk0` FOREIGN KEY (`Channel Id`) REFERENCES `Channels`(`Channel Id`);

ALTER TABLE `Messages` ADD CONSTRAINT `Messages_fk1` FOREIGN KEY (`User Id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Reactions` ADD CONSTRAINT `Reactions_fk0` FOREIGN KEY (`Message Id`) REFERENCES `Messages`(`Message Id`);

ALTER TABLE `Reactions` ADD CONSTRAINT `Reactions_fk1` FOREIGN KEY (`Reaction`) REFERENCES `emoji's table`(`emoji Id`);

ALTER TABLE `Reactions` ADD CONSTRAINT `Reactions_fk2` FOREIGN KEY (`User Id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Thread ` ADD CONSTRAINT `Thread _fk0` FOREIGN KEY (`Message Id`) REFERENCES `Messages`(`Message Id`);

ALTER TABLE `Thread ` ADD CONSTRAINT `Thread _fk1` FOREIGN KEY (`User Id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Thread Reactions` ADD CONSTRAINT `Thread Reactions_fk0` FOREIGN KEY (`Thread Id`) REFERENCES `Thread `(`Thread ID`);

ALTER TABLE `Thread Reactions` ADD CONSTRAINT `Thread Reactions_fk1` FOREIGN KEY (`Reaction`) REFERENCES `emoji's table`(`emoji Id`);

ALTER TABLE `Thread Reactions` ADD CONSTRAINT `Thread Reactions_fk2` FOREIGN KEY (`User ID`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Direct Messages` ADD CONSTRAINT `Direct Messages_fk0` FOREIGN KEY (`from_user_id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Direct Messages` ADD CONSTRAINT `Direct Messages_fk1` FOREIGN KEY (`to_user_id`) REFERENCES `Invited Users`(`User ID`);

ALTER TABLE `Direct Messages` ADD CONSTRAINT `Direct Messages_fk2` FOREIGN KEY (`workspace URL`) REFERENCES `SlackURL`(`workspace URL`);

