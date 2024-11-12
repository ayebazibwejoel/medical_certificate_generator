# Medical Certificate Generator App

## Project Overview
The **Medical Certificate Generator App** is a simple and efficient web application developed to help clinics generate, manage, and download medical certificates for their patients. The system enables clinic staff to quickly add, edit, view, and delete certificate records while generating downloadable PDF files for documentation.

---

## Developer Information
**Name**: Ayebazibwe Joel  
**University**: Kabale University  
**Course**: Bachelor of Computer Science  
**Year**: Year 2, First Semester

---

## Features
- Add new medical certificate records.
- View, update, and delete existing records.
- Generate PDF files for certificates.
- Responsive and user-friendly interface.
- Uses Material Kit UI and Bootstrap for styling.

---

## Technologies Used
- **Frontend**: HTML, CSS, Bootstrap, JavaScript, jQuery
- **Backend**: PHP, MySQL
- **PDF Generation**: DOMPDF library
- **Development Environment**: XAMPP (Apache, MySQL, PHP)

---

## Project Structure

---

## Database Schema

### Table: `certificates`
| Field          | Type         | Description                      |
|----------------|--------------|----------------------------------|
| `id`           | INT (Primary Key, Auto Increment) | Unique identifier |
| `patient_name` | VARCHAR(100) | Name of the patient             |
| `age`          | INT          | Age of the patient              |
| `gender`       | VARCHAR(10)  | Gender of the patient           |
| `diagnosis`    | TEXT         | Diagnosis information           |
| `issue_date`   | DATE         | Date the certificate was issued |
| `doctor_name`  | VARCHAR(100) | Name of the doctor              |
| `certificate_id` | VARCHAR(50) | Unique certificate ID          |
| `pdf_path`     | VARCHAR(100) | Path to the generated PDF       |

---

## Installation & Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/medical-certificate-generator.git
