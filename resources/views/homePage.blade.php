<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MyQBee</title>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <style>
        body, html{
        height:100%;
        margin:0;
        font-size:16px;
        font-family: 'Montserrat', sans-serif;
        font-weight:400;
        line-height:1.8em;
        color:#666;
        }

        .pimg1, .pimg2, .pimg3{
        position:relative;
        opacity:0.70;
        background-position:center;
        background-size:cover;
        background-repeat:no-repeat;

        /*
            fixed = parallax
            scroll = normal
        */
        background-attachment:fixed;
        }

        .pimg1{
        background-image:url('https://images.pexels.com/photos/301920/pexels-photo-301920.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        min-height:100%;
        }

        .pimg2{
        background-image:url('https://images.pexels.com/photos/442574/pexels-photo-442574.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        min-height:400px;
        }

        .pimg3{
        background-image:url('https://images.pexels.com/photos/1166657/pexels-photo-1166657.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        min-height:400px;
        }

        .section{
        text-align:center;
        padding:50px 80px;
        }

        .section-light{
        background-color:#f4f4f4;
        color:#666;
        }

        .section-dark{
        background-color:#282e34;
        color:#ddd;
        }

        .ptext{
        position:absolute;
        top:50%;
        width:100%;
        text-align:center;
        color:#000;
        font-size:27px;
        letter-spacing:8px;
        text-transform:uppercase;
        }

        .ptext .border{
        background-color:#111;
        color:#fff;
        padding:20px;
        }

        .ptext .border.trans{
        background-color:transparent;
        }

        .bg-primary{
            background-color: black !important;
        }

        @media(max-width:568px){
        .pimg1, .pimg2, .pimg3{
            background-attachment:scroll;
        }

        }
        


  </style>
</head>
<body>
@include('inc.navbar')
@include('inc.messages')
  <div class="pimg1">
    <div class="ptext">
      <span class="border">
        Welcome to MyQBee
      </span>
    </div>
  </div>

  <section class="section section-light">
    <h2>Multiple Choice</h2>
    <p>
    A multiple-choice question (MCQ) is composed of two parts: a stem that identifies the question or problem, and a set of alternatives or possible answers that contain a key that is the best answer to the question, and a number of distractors that are plausible but incorrect answers to the question. Students respond to MCQs by indicating the alternative that they believe best answers or completes the stem. There are many advantages to using MCQs for assessment. One key advantage is that the questions are easy to mark and can even be scored by a computer, which makes them an attractive assessment approach for large classes. Well designed MCQs allow testing for a wide breadth of content and objectives and provide an objective measurement of student ability.    </p>
  </section>

  <div class="pimg2">
    <div class="ptext">
      <span class="border trans">
       Identification
      </span>
    </div>
  </div>

  <section class="section section-dark">
    <h2>Identification</h2>
    <p>
    There are two general categories of test items: (1) objective items which require students to select the correct response from several alternatives or to supply a word or short phrase to answer a question or complete a statement; and (2) subjective or essay items which permit the student to organize and present an original answer. Objective items include multiple-choice, true-false, matching and completion, while subjective items include short-answer essay, extended-response essay, problem solving and performance test items. For some instructional purposes one or the other item types may prove more efficient and appropriate. To begin out discussion of the relative merits of each type of test item, test your knowledge of these two item types by answering the following questions. 
    </p>
  </section>

  <div class="pimg3">
    <div class="ptext">
      <span class="border trans">
        True or False
      </span>
    </div>
  </div>

  <section class="section section-dark">
    <h2>True or False</h2>
    <p>
    True or False questions may be easy to grade, but creating the ideal T/F question can pose quite a challenge for eLearning professionals. Their simplicity leaves little room for wordiness and each question must be clear and to-the-point in order to assess learner comprehension.
    </p>
  </section>

</body>
</html>
