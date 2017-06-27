-- increase limit to 80 characters
ALTER TABLE Accounts MODIFY COLUMN PasswordHash varchar(80);

-- add token column
ALTER TABLE Accounts ADD Tokeny varchar(50);