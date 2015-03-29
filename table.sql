--
-- Table structure for table `notes`
--

CREATE TABLE notes (
  id integer primary key autoincrement,
  text varchar(128) NOT NULL default '',
  name varchar(60) NOT NULL default '',
  color varchar(20) NOT NULL default 'yellow',
  xyz varchar(20) NOT NULL default '',
  flag integer not null default 0,
  dt timestamp NOT NULL default CURRENT_TIMESTAMP
);

--
-- Dumping data for table `notes`
--

INSERT INTO notes VALUES(1, 'This is the first note! Add yours from the button above..', 'Martin', 'yellow', '478x0x1', 0, '2010-01-17 06:30:14');
INSERT INTO notes VALUES(2, 'The position of the notes is saved with AJAX.', 'Martin', 'blue', '0x321x2', 0, '2010-01-17 06:57:39');
INSERT INTO notes VALUES(3, 'The notes are automatically deleted after an hour.', 'Martin', 'green', '311x41x3', 0, '2010-01-17 06:57:39');
