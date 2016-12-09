create TABLE users(
  userID int not null AUTO_INCREMENT,
  firstname varchar(50),
    lastname varchar(50),
    email varchar(100),
    password varchar(20),
    phoneNumber varchar(15),
    primary key(userID)  
);
create TABLE admin(
  adminID int not null AUTO_INCREMENT,
  firstname varchar(50),
    lastname varchar(50),
    email varchar(100),
    password varchar(20),
    phoneNumber varchar(15),
    primary key(adminID)  
);
create TABLE reservations(
  id int not null AUTO_INCREMENT,
  placeName varchar(50),
    placeAddress varchar(50),
    website varchar(100),
    phoneNumber varchar(15),
    userID int,
    
    primary key(id),
    foreign key (userID) references Users(userID)
    

);


CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL ,
  `phoneNumber` varchar(15) NOT NULL,
  `type` VARCHAR( 30 ) NOT NULL
);