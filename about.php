<!DOCTYPE html>
<html>
  <head>
    <title>About</title>
	<link rel="stylesheet" href="styles/styles_about.css"
    </head>
  <body>    
       <div class="navbar">
            <?php include 'menu.inc'; ?>
       </div>

        <section class="intro">
    <h1>About Us</h1>
    <hr> 
    <dl class="Introduction">
        <dt>Group Name:</dt>
        <dd>High Distinction Only</dd>
        <dt>Group ID:</dt>
        <dd>10001</dd>
        <dt>Tutor Name:</dt>
        <dd>Ms. Ru Jia (Monica)</dd>
        <dt>Course:</dt>
        <dd>COS10026</dd>
        <dt>Group Email:</dt>
        <dd>Contact Us:  <a href="mailto:104178189@student.swin.edu.au">Group's Email</a></dd>
    </dl> 
        <figure class="group_photo">
        <img src="images/group_photo.png" alt="group_photo" class=groupimage>  <!---created class-->
        </figure>
</section>
<section class="meet_members">
    <h2><u>Meet The Members</u></h2>
</section>
    <section class="container-1">
    <section class="members"> 
        <figure><img src="images/pheak.jpeg" alt="Image of Pheak" class="selfies"></figure> <!----created class-->
        <figcaption>Sokpheakkdey Tith</figcaption>   
        <p>Greetings! My name is Pheak, and I'm flying all the way from the Kingdom of Wonder, Cambodia! I may be new to programming however, I have learned a little bit of HTML and CSS and touched base on Python before, thanks to the amazing resources provided on Freecodecamp and YouTube.</p>
        <p>Aside from coding, I have a passion for Basketball, and even had the honor to play for the Cambodia's Basketball Team for a few months. When I'm away from the court, I like to read personal development books to give me an insight of people's mistakes and how to avoid them. I'm always open to exploring new things and making new friends, so feel free to reach out to me!</p>
    </section>
    <section class="members"> 
        <figure><img src="images/arsh.jpeg" alt="Image of Arsh" class=selfies></figure> <!--created class -->
        <figcaption>Arsh</figcaption>
        <p>Hey! My name is Arsh, and I am from The Land Of Cultures , India. I'm constantly looking for new technology to experiment with. Up until now, I've only worked with Java briefly and know a tiny amount of Python.</p>
        <p>In my spare time, I enjoy reading in addition to technology. In order to improve my creative abilities and gain insight into my mistakes and how to avoid them, I prefer to read thriller, mystery, and personal development novels.</p>
        <p>I m always up to travel and hangout with my friends, so feel free to hit me up!I m always up to travel and hangout with my friends, so feel free to hit me up!</p>
    </section>
</section>
<section class="container-2">
    <section class="members"> 
        <figure><img src="images/melvin.jpeg" alt="Image of Melvin" class=selfies></figure> <!---crated class-->
        <figcaption>Melvin</figcaption>
        <p>Hello, I am a regional student from Shepparton (a country town 3 hours north of Melbourne) and have minor experience in programming with python already. Originally I am from Albania but am proud to call Australia my home now. In my spare time i like to read literature, philosophy and write.</p>
    </section>
    <section class="members"> 
        <figure><img src="images/nik.jpeg" alt="Image of Nik" class=selfies></figure> <!---crated class-->
        <figcaption>Nikhil</figcaption>
        <p>Hello! My name is Nikhil, and I'm a local student who is about to graduate from John Monash Science School. I've always been interested in computer science, but I have been more involved in the hardware aspect of things. For example, I used to perform battery and screen replacements for friends and family in high school. Although I'm only just starting to learn languages such as Python, HTML, CSS, and Ruby, I am enjoying it despite the steep learning curve.</p>
        <p>Aside from school, I'm a 3rd-degree brown belt in Kenpo Karate and hoping to resume it soon to finally earn my black belt. I also have a keen interest in option trading, which is particularly more interesting in our current economy. I enjoy catching up with friends from high school and am always open to meeting new people. Although I don't often read many books, one genre that continues to intrigue me is philosophy.</p>
    </section>
</section>
    <section class="subheading">
        <h2><u>Time Table</u></h2>
    </section>
    <section class="table-container">
    <table class="table-info">
        <tr>
        <th></th>
        <th>Monday</th>
        <th>Tuesday</th>
        </tr>
        <tr>
            <td>12:30-1:30</td>
            <td>COS10026: Online Lecture 1</td>
            <td></td>
        </tr>
        <tr>
            <td>1:30-2:30</td>
            <td>COS10026: Class 1</td>
            <td></td>
        </tr>
        <tr>
            <td>
                2:30-4:30</td>
                <td></td>
                <td>COS10026: Workshop 1</td>
            </td>
            </tr>
    </table>
</section>
    
    <?php include 'footer.inc'; ?>
</body>
</html>