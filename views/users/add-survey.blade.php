@extends('main')

@section('content')

<div class="add-survey">
    <div class="add-survey__window">
        <form method="POST">
            <h2 class="add-survey__title">Add survey</h2>
            @csrf
            <input type="hidden" name="id" value="1" />

            <input class="add-survey__question" name="survey_name" type="text" placeholder="Survey name" />
            <div id="question-wrapper">
                <div id="question-holder1">
                    <input class="add-survey__question" name="question" type="text" placeholder="Question" />
                    <label for="option">Choose a option:</label>
                    <div class="add-survey__options">
                        <select class="add-survey__options--option" name="option" id="option">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Radio</option>
                            <option value="2">Checkbox</option>
                            <option value="3">Text field</option>
                            <option value="4">Radio with text field</option>
                            <option value="5">Checkbox with text field</option>
                        </select>
                    </div>

                    <div id="answer-wrapper1">
                        <div id="answer-holder1">
                            <input type="text" id="answer1" name="answer" class="add-survey__question" placeholder="Answers"> --}}
                            {{-- <button type="button" id="delete-answer1" class="add-survey__button-question--del" onclick="deleteAnswer(this)">Delete answer</button> --}}
                            {{-- <button type="button" id="add-answer1" class="add-survey__button-question--add" onclick="addAnswer(this)">Add another answer</button> --}}
                            {{-- <div class="add-survey__new--answer"></div>
                            <div class="add-survey__new--question"></div> --}}
                        {{-- </div>
                    </div>
                    <button id="add-question1" type="button" class="add-survey__button" onclick="addQuestion(this)">Add another question</button>
                </div>
            </div>
            <button class="add-survey__button">Create survey</button>
        </form>
    </div>
</div>

<script type="text/javascript" >
    'use strict'

    let idQuestion=1;
    let question=[
        {
            appendQuestion:
            `<div id="question-wrapper${idQuestion}">
                <div id="question-holder${idQuestion}">
                    <input class="add-survey__question" name="question${idQuestion}" type="text" placeholder="Question" />
                    <label for="option">Choose a option:</label>
                    <div class="add-survey__options">
                        <select class="add-survey__options--option" name="option${idQuestion}" id="option">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Radio</option>
                            <option value="2">Checkbox</option>
                            <option value="3">Text field</option>
                            <option value="4">Radio with text field</option>
                            <option value="5">Checkbox with text field</option>
                        </select>
                    </div>

                    <div id="answer-wrapper${idQuestion}">
                        <div id="answer-holder${idQuestion}">
                            <input type="text" id="answer${idQuestion}" name="answer${idQuestion}" class="add-survey__question" placeholder="Answers">
                            <button type="button" id="add-answer${idQuestion}" class="add-survey__button-question--add" onclick="addAnswer(this)">Add another answer</button>
                        </div>
                    </div>
                    <button id="add-question${idQuestion}" type="button" class="add-survey__button" onclick="addQuestion(this)">Add another question</button>
                </div>
            </div>`
        },
    ];
        console.log(question[0].appendQuestion);
        const answerInput = document.createElement('div');
        answerInput.setAttribute("id", `answer-wrapper${idQuestion}`);
        answerInput.innerHTML=question[0].appendQuestion;
        document.getElementById(`answer-wrapper${idQuestion}`).appendChild(answerInput);










    // let elIdNumber = 1;
    // let answerWrapper= `answer-wrapper${elIdNumber}`;
    // const deleteAnswer = () => {
    //     const element = this.document.activeElement.id;
    //     console.log(element.slice(-1));
    //     document.getElementById(`answer-holder`).remove();
    // }
    // const addAnswer = () => {
    //     const element = this.document.activeElement.id;
    //     console.log(elIdNumber);
    //     const answerInput = document.createElement('div');
    //     answerInput.setAttribute("id", `answer-wrapper${elIdNumber}`);
    //     answerInput.innerHTML = `<div id="answer-holder${elIdNumber}">
    //                 <input type="text" id="answer${elIdNumber}" name=" answer" class="add-survey__question" placeholder="Answers">
    //                 <button type="button" id="delete-answer${elIdNumber}" class="add-survey__button-question--del" onclick="deleteAnswer(this)">Delete answer</button>
    //                 <button type="button" id="add-answer${elIdNumber}" class="add-survey__button-question--add" onclick="addAnswer(this)">Add another answer</button>
    //                 <div class="add-survey__new--answer"></div>
    //                 </div>`;
    //     document.getElementById(`answer-wrapper${elIdNumber}`).appendChild(answerInput);
    //     elIdNumber++;
    // }
    // const addQuestion = () => {
    //     const element = this.document.activeElement.id;
    //     const questionInput = document.createElement('div');
    //     questionInput.setAttribute("id", `question-holder${Number(element.slice(-1))+1}`);
    //     questionInput.innerHTML = `
    //                 <input class="add-survey__question" name="question${elIdNumber}" type="text" placeholder="Question" />
    //                 <label for="option">Choose a option:</label>
    //                 <div class="add-survey__options">
    //                     <select class="add-survey__options--option" name="option" id="option">
    //                         <option value="" disabled selected>Choose your option</option>
    //                         <option value="1">Radio</option>
    //                         <option value="2">Checkbox</option>
    //                         <option value="3">Text field</option>
    //                         <option value="4">Radio with text field</option>
    //                         <option value="5">Checkbox with text field</option>
    //                     </select>
    //                 </div>

    //                 <div id="answer-wrapper${elIdNumber}">
    //                     <div id="answer-holder${elIdNumber}">
    //                         <input type="text" id="answer${elIdNumber}" name=" answer" class="add-survey__question" placeholder="Answers">
    //                         <button type="button" id="add-answer${elIdNumber}" class="add-survey__button-question--add" onclick="addAnswer(this)">Add another answer</button>
    //                         <div class="add-survey__new--answer"></div>
    //                         <div class="add-survey__new--question"></div>
    //                     </div>
    //                 </div>
    //                 <button id="add-question${elIdNumber}" type="button" class="add-survey__button" onclick="deleteQuestion(this)">Delete question</button>
    //                 <button id="add-question${elIdNumber}" type="button" class="add-survey__button" onclick="addQuestion(this)">Add another question</button>
    //             `
    //     document.getElementById("question-wrapper").appendChild(questionInput);
    //     elIdNumber++
    // }
    // const deleteQuestion = () => {
    //     const element = this.document.activeElement.id;
    //     console.log(element.slice(-1));
    //     document.getElementById(`question-holder${element.slice(-1)}`).remove();
    // }
</script>
@endsection