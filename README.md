TerminalTable

TerminalTable formats a table to be displayed with a monospaced font, ie on a
terminal or as output into a text file.

Use by implementing a TerminalTableModel which should prepare the data for
TerminalTable.
If you need colors and attributes (such as "blink"), then implement
TerminalTableLayout, either as a separate class or by having your main model
implement TerminalTableLayout as well.

Please note that this class needs plibv4-vtc and plibv4-longeststring; I've not
yet come around to realize a proper packaging setup.
