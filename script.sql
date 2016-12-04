create TABLE users(
  userID int not null AUTO_INCREMENT,
  firstname varchar(50),
    lastname varchar(50),
    email varchar(100),
    password varchar(20),
    phoneNumber varchar(15),
    primary key(userID)  
);
