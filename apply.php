<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creating Web Applications"/>
    <meta name="keywords" content="HTML, CSS, and Javascript"/>
    <meta name="author" content="HDO"/>
    <link rel="stylesheet" href="styles/styles_apply.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Apply!</title>
</head>
<body>
    <div class="navbar">
        <?php include 'menu.inc'; ?>
    </div>

    <section class="main">
        <h1 class="blockslim_h">Please apply here!</h1> 
    </section>

    <section class="container">
        <table class="table">
            <tr>
                <th colspan="2"><h2>Application Form</h2></th>
            </tr>
            <form action="processEOI.php" method="post">
                <tr>
                    <td>Job Reference Number:</td>
                    <td><input type="text" name="jobRef" placeholder="XXXXX" maxlength="5" required></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="firstName" placeholder="John" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lastName" placeholder="Doe" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="DOB" required></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="other">Other</label>
                        <input type="radio" id="other" name="gender" value="other">
                    </td>
                </tr>
                <tr>
                    <td>Street Address:</td>
                    <td><input type="text" name="streetAddress" maxlength="40" required></td>
                </tr>
                <tr>
                    <td>Suburb:</td>
                    <td><input type="text" name="suburbTown" maxlength="40" required></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td>
                        <input list="states" name="state">
                        <datalist id="states">
                            <option value="VIC"></option>
                            <option value="NSW"></option>
                            <option value="QLD"></option>
                            <option value="NT"></option>
                            <option value="WA"></option>
                            <option value="SA"></option>
                            <option value="TAS"></option>
                            <option value="ACT"></option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td><input type="text" name="postcode" minlength="4" maxlength="4" pattern="[0-9]{4}" required></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="phoneNumber" pattern="[0-9]{8,12}" required></td>
                </tr>
                <tr>
                    <td>Skills:</td>
                    <td>
                        <label for="python">Python</label>
                        <input type="checkbox" id="python" name="skills[]" value="python" required>
                        <label for="html">HTML</label>
                        <input type="checkbox" id="html" name="skills[]" value="html">
                        <label for="php">PHP</label>
                        <input type="checkbox" id="php" name="skills[]" value="php">
                        <label for="otherSkills">Other Skills</label>
                        <input type="checkbox" id="otherSkills" name="skills[]" value="otherSkills">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" size="29" id="otherSkillsInput" name="otherskills" placeholder="If you have other skills, list them here!">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <button type="submit">Submit!</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </form>
        </table>
    </section>
    
    <?php include 'footer.inc'; ?>
</body>
</html>
