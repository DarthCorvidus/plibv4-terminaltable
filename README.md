# TerminalTable

TerminalTable formats a table to be displayed with a monospaced font, ie on a terminal or as output into a text file.

TerminalTable expects an implementation of TerminalTableModel to deliver the cell values to be displayed. An additional implementation of TerminalTableLayout can be used to add VT100 colors and attributes as well as justify left or right.