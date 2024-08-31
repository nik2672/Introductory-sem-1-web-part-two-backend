<!DOCTYPE html>
<html>
  <head>
    <title>Enhancements</title>
 	<link rel="stylesheet" href="styles/styles_enhancement.css"
    </head>
  <body>
    <?php include 'menu.inc'; ?>

    <h1>Enhancements</h1>
    <hr>
    <div class="description">

    <h2 align= "center"><u>Responsive Design</u></h2>
    <h4 align="center"> Auto Image Adjust</h4>
    <p align= "center">Located in the <a href="about.php">"About"</a> as well as on the enhancements page you're currently viewing, media queries are used to make images responsive to the size of the screen. As seen in the code snapshot below, when the screen is less than or equal to 768 pixels, CSS styles will be applied to containers 1 and 2, which include the images. Styles such as "display: flex" set the container to use a flexbox layout, and most importantly, the use of "flex-direction: column" sets the flex direction to be vertical so that the images align in a column.</p>

    <p align= "center">The enhacement page images also utilise media queries however the styles are only applied at a width of 1063 pixels. Making these images responsive had a unique set of hurdles are unlike the <a href="about.php">"About"</a> page, the images were extremely small and therefore needed to be increased in size on small displays. As seen in the code snippet below, this is achieved through the use of "width: 90%", while extremely large images are scaled down with "width: 50%". Additionally, the use of "display: block" sets the images to be displayed as blocks rather than inline elements, allowing them to take up the width of their container.</p>
      <a class="L" href="https://www.w3schools.com/css/css3_mediaqueries_ex.asp"
      target="_blank">Media Queries Source</a>
      <a class="L" href="https://www.w3schools.com/howto/howto_css_image_responsive.asp"
      target="_blank">Responsive Images Source</a>
      <a class="L" href="https://www.freecodecamp.org/news/css-responsive-image-tutorial/"
      target="_blank">CSS Responsive Images Source</a>
        <img src="images/image.png" alt="responsive" class="image21">
        <img src="images/image2.png" alt="responsive" class="image21">
    <h4 align="center">Callout Box Auto Adjust</h4>
    <p align="center">The callout box located in the <a href="index.php">"Index"</a> enables the callout box to automatically adjust to the bottom of the screen and span the width of the page when viewed on a small screen. Using media queries, when the width of the display is 820px, the styles will apply to the .callout, .callout-header, and .callout-container. As seen in the code snippet below, the callout box will span a new width of 100%, as well as applying other important styles such as a smaller font size and margins that span the whole page.
       <a class="L" href="https://www.w3schools.com/css/css3_mediaqueries_ex.asp" target="_blank">Media Queries Source</a>
         <img src="images/callout.png" alt="callout" class="image" >
    <h4 align="center">Navigation Bar</h4>
    <p align= "center">Using media quieries specific styles are applied to the navigation bar to make it responsive. For example you can observe this in the <a href="index.php">"Index"</a> page. When the width is equal to or below 820, links will be centered in the navigation bar. Additionally, using "display: block" and reducing the font size enables the links to fit well in the reduced space of the navigation bar when the width is shortened. Finally, as seen in the code snippet below, the ::after pseudo-element that is part of the pre-existing animation has been removed using "display: none", in order to prevent the 'underline animation' from blocking the navigation links. Moreover, smaller display users would most likely be using a touch display, making the animation redundant.</p>
    <img src="images/navbar.png" alt="callout" class="image" >
    <h4 align="center"> Automatic Table Adjustment </h4>
    <p align="center">Located in the bottom of the <a href="about.php">"About"</a> page there is a table, and as you can see in the code snippet below, media queries have been used to apply styles to the table when the width of the page is less than 1250 pixels. Styles such as reducing the width of the table to 80% allow it to better adjust to the small device screen it is on. Most importantly, the use of "font-size: 0.8em" has been used to override any previous fonts as they are relative units. This means they are based on the font size of the parent element, so if the parent element changes, the child element will change proportionally, hence making the font adjust fluidly with different size displays.</p>
       <a class="L" href="https://www.w3schools.com/cssref/css_units.php" target="_blank">REM and EM Units Source</a>
          <img src="images/table.png" alt="callout" class="imagetable" >

    <h2 align= "center"><u>Animations</u></h2>
    <h4 align= "center">JPEG Hover Animation </h4>
    <p align= "center">Located in the <a href="about.php">"About"</a> page our team's selfies and group photo can be seen hovering up and down. In order to implement this enhancement, the 'animation' property is used to create a floating animation of the element which will last 1500 milliseconds and repeat infinitely in an alternate reverse direction, moving 20 pixels from its original position. The "selfies:hover" selector is used to implement the "transform" property such that the image is scaled 110% of its original size when hovered over by the mouse. The "@keyframes" rule involves two stages of the animation - one at the start (0%) and one at the end (100%). The "transform" property then moves the element from its original position on the axis (translateY()) and moves it 20 pixels down (translateY(20px)) at the end of the animation. </p>
    <p align= "center">This enhancement goes beyond the introductory course as it demonstrates how the use of keyframe animations, transitions, and hover effects in CSS can be used to create visually dynamic effects on our <a href="about.php">"About"</a> page. </p>
       <a class="L" href="https://www.w3schools.com/cssref/css3_pr_animation-keyframes.php" target="_blank">CSS @keyframes Rule Source</a>
       <a class="L" href="https://www.w3schools.com/howto/howto_css_image_overlay.asp" target="_blank">CSS Image Hover Overlay Source</a>
       <a class="L" href="https://www.w3schools.com/cssref/pr_class_float.php" target="_blank">CSS Float Property Source</a>
           <img src="images/group.png" alt="group code" class="image2">
           <img src="images/seflies.png" alt="selfie code" class="image2">
           <img src="images/keyframes.png" alt="keyframes" class="image2">
    <h4 align="center">Navigation Bar Animations</h4>
    <p align="center">Two animations have been applied to the navigation bar located in all pages. The first applied animation makes the navigation menu more interactive by providing a smooth, animated green underline beneath each navigation bar link when the user hovers their pointer over them. As seen in the first image below the first block of code sets up a small underline for each navigation bar link. It creates a pseudo element that has no content as indicated by (''). A transition effect is then applied causing the underline to animate smoothly over a duration of 0.5 seconds. The second block applies a hover effect to the navigation bar links which increases from 0 to 100% width creating an underline effect. </p>
    <p align="center">The second animation applied to the navigation bar functions similarily to the first, providing yet another visual cue to the user. When the users mouse hovers over the link in addition to the animated underline the colour of the link will transition smoothly from white to green. As seen in the first block the transition property takes a duraton of 0.3 seconds thus allowing the links to be animated smoothly. The second block of code applies the hover effect. When the user hovers over a link, the colour will change from white to green thus matching that of the animated underline. The :hover pseudo class is used to ensure the effect only applies when the user hovers over the link. </p>
       <a class="L" href="https://www.w3schools.com/cssref/sel_hover.php" target="_blank">CSS Hover Selector Source</a>
       <a class="L" href="https://stackoverflow.com/questions/14350126/transition-color-fade-on-hover" target="_blank">Colour Transition Source</a>
         <img src="images/line.png" alt="nav bar underline" class="image3">
          <img src="images/colour.png" alt="nav bar colour" class="image3">
    <h4 align= "center">Interactive Text Hover Animation </h4>
    <p align= "center">Located in jobs, apply, about and enhnacments page. Using the universal selector (*) the css code creates a smooth ease in and out animation for a duration of 0.2 seconds. When text is hovered over by the mouse elements will move along the y-axis by -2 pixels this creates visual feedback to users. This is achieved using the ':hover' pseudo-class.</p>
    <p align= "center">This enhancmenet showcases the effective use of transition effects, pseudo-classes, and transform property to create hover effects for page elements. </p>
      <a class="L" href="https://www.w3schools.com/howto/howto_css_transition_hover.asp" target="_blank">Transition to Hover Source</a>
      <a class="L" href="https://www.w3schools.com/css/css3_transitions.asp" target="_blank">CSS Transition Source</a>
        <img src="images/interactive-text.png" alt="interactive text" class="image">
    <hr>
    </div>

  <?php include 'footer.inc'; ?>
  </body>
</html>
