# Remote Lab Assistant

**A Management Website for CSE Sessionals**

## Introduction

The "CSE 3100 Remote Lab Assistant" is an innovative web-based platform designed to streamline the sessional activities of our Computer Science and Engineering (CSE) course. Traditionally, sessionals involve solving problems in a physical lab setting, where teachers manually assess students' code and performance. This process can be time-consuming and inefficient. The Remote Lab Assistant offers a digital solution to enhance efficiency, facilitate problem-solving, and provide a more convenient experience for both teachers and students.

## Features

### Teacher's Panel

The Teacher's panel offers the following features:

- **Post Task**: Teachers can post problem statements digitally, replacing the need for a physical whiteboard. Posted tasks are stored in the database and can be accessed by students.
- **Tasks**: View a chronological list of all tasks posted by teachers. Easily manage and view student responses.
- **Responses**: Access student responses in an automated table format, including roll numbers, names, submitted code, and submission times.
- **View Class**: See the list of enrolled students, instructor details, and course code. Update attendance and generate PDF attendance sheets.

### Student's Panel

The Student's panel provides the following features:

- **Join Class**: Enroll in courses offered by different instructors. Confirmation indicators ensure successful enrollment.
- **Task**: View and solve problem statements related to enrolled courses. Submit code and engage in the learning process.
- **Feedback**: Access teacher feedback for improved understanding and learning outcomes.

## Data Management

The platform uses a MySQL database to store various types of information:

- **Student Table**: Stores student signup data.
- **Teacher Table**: Stores teacher signup data.
- **Task Table**: Manages posted tasks.
- **Code Table**: Contains student responses and relevant details.
- **Course_Student Table**: Relational table for student-course mapping.
- **Feedback Table**: Stores teacher feedback.
- **Attendance Table**: Manages attendance records.

## Technologies Used

- Programming Languages: HTML, CSS, JavaScript, PHP, SQL
- Database: MySQL
- Software: Visual Studio Code, XAMPP Control Panel, Microsoft Edge

## Getting Started

1. Clone this repository to your local machine.
2. Set up a local development environment using XAMPP or a similar solution.
3. Import the provided SQL database dump to set up the required database structure.
4. Configure the database connection settings in the code to match your local setup.
5. Access the application through a web browser.

## Contribution

We welcome contributions to enhance the Remote Lab Assistant. If you have suggestions, bug reports, or feature requests, please feel free to open an issue or submit a pull request.


---

