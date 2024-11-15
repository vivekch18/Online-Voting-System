# Online-Voting-System
The Online Voting System provides a secure and user-friendly interface for voters to participate in elections remotely. The system allows eligible voters to view available political parties and cast their vote electronically, which makes the voting process more efficient and accessible. The project aims to provide a platform for modern electoral practices that can be utilized in local, state, or national elections.<br>
<h3>Key Features</h3>
<b>User Authentication:<br>
Dashboard for Voters:<br>
Voting Process:<br>
Responsive Design:<br>
User Roles:<br></b>
*Voter: Voters can view party details, check their voting status, and cast their vote once.<br>
*Party Member: Parties can register, manage their details, and track the votes they receive<br>
<h3>Backend Functionality</h3>
<h4>Session Management:</h4> The system uses PHP session management to handle user authentication and track whether the user has logged in.
<h4>Database Interaction:</h4> Data such as voter profiles, party details, and voting records are fetched from a database. This data is used to populate the dashboard with real-time information.
<h4>Vote Management:</h4> When a voter submits their vote, the system updates the corresponding party's vote count in the database. Voters are prevented from voting more than once, ensuring the integrity of the election process.
<h3>Technologies Used:</h3>
<h4>Frontend:</h4> The frontend of the application is developed using HTML, CSS (with custom styles), and Bootstrap. The Bootstrap framework ensures that the application is mobile-responsive and visually appealing.
<h4>Backend:</h4> PHP is used as the server-side language to process requests, authenticate users, and handle session management. The backend also interacts with the database to retrieve and update voting data.
<h4>Database:</h4> A relational database (like MySQL) stores user and party information, including voter registration details, party details, and votes. The database ensures data persistence and enables smooth retrieval of information when required.
<h3>Security Features:</h3>
<h4>Password Protection:</h4> The system ensures that only registered users with valid credentials can log in and access the voting platform.
<h4>Session Control:</h4> If a session expires or if the user is not logged in, they are redirected to the login page to ensure only authorized users can vote.
<h4>Data Validation:</h4> The input fields (e.g., mobile number, password) are validated to ensure accurate and valid data entry.
<h2>Snapshots of the project</h2>
