--
-- Table structure for table `notes`
--

CREATE TABLE notes (
  id integer primary key autoincrement,
  text varchar(128) NOT NULL default '',
  name varchar(60) NOT NULL default '',
  color varchar(20) NOT NULL default 'yellow',
  xyz varchar(20) NOT NULL default '',
  flag integer not null default 1,
  dt timestamp NOT NULL default CURRENT_TIMESTAMP
);

--
-- Dumping data for table `notes`
--

INSERT INTO notes (id, text, name, color, xyz) VALUES(1, 'This is the first note! Add yours from the button above.', 'StickyNotes', 'yellow', '478x0x1');
INSERT INTO notes (id, text, name, color, xyz) VALUES(2, 'The position of the notes is saved with AJAX.', 'StickyNotes', 'blue', '0x321x2');
INSERT INTO notes (id, text, name, color, xyz) VALUES(3, 'The notes are automatically deleted after an hour.', 'StickyNotes', 'green', '311x41x3');
