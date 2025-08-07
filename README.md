Task 1 – Dynamic menu building and navigation using a URL parameter.
You are provided with a basic template index.php file, containing a two dimensional array, which is used to
define the following NAV menu structure from the Department of Computer Science Intranet:
1. Home
2. Study
2.1. Undergraduate
2.1.1. Computer Science
2.1.1.1. Introduction to Programming
2.1.1.2. Database Technology
2.1.2. Data Science
2.2. Post Graduate
2.2.1. Software Engineering
2.2.2. Computer Forensics
2.3. Research Degrees
3. Research
3.1. Staff
3.2. Research Projects
3.3. Research Students
4. Seminars
4.1. Current Year
4.2. Previous Years
You are required to create a PHP application which uses the given data array to display the above NAV
structure as an interactive nested HTML unordered list, with each list item a selectable HTML link. If a link
is selected you should display the name of the link selected below the unordered list, as well as any related
sub-unordered list; if the selected link has an associated sub menu.
