@extends ('main')

@section('content')


<div class="survey">
    <div class="survey__logo"></div>
    <form class="survey__window" action="" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$survey[0]->id}}" />
        <h2 class="survey__title">{{$survey[0]->name}}</h2>
        <?php $x=0;?>
        @foreach ($questions as $item)
            <input type="hidden" name="question{{++$x}}" value="{{$item->question}}" />
            <input type="hidden" name="count" value="{{$x}}" />

            <p class="survey__survey">{{ucfirst(trans($item->question))}}</p>
            @if($item->option===1)
                <?php $answer_array = explode(',', $item->answer); ?>
                @foreach ($answer_array as $item)
                    <label class="survey__survey-answer"><input type="radio" name="checkAnswer{{$x}}" value="{{$item}}" /> {{ucfirst(trans($item))}} </label>
                @endforeach
            @elseif($item->option===2)
                <?php $answer_array = explode(',', $item->answer); ?>
                @foreach ($answer_array as $item)
                    <label class="survey__survey-answer"><input type="checkbox" name="checkAnswer{{$x}}[]" value="{{$item}}" /> {{ucfirst(trans($item))}} </label>
                @endforeach
            @elseif($item->option===3)
                <textarea class="survey__comment" name="comment{{$x}}" rows="4" cols="50" placeholder="Take your comment..."></textarea>
            @elseif($item->option===4)
                <?php $answer_array = explode(',', $item->answer); ?>
                @foreach ($answer_array as $item)
                    <label class="survey__survey-answer"><input type="radio" name="checkAnswer{{$x}}" value="{{$item}}" /> {{ucfirst(trans($item))}} </label>
                @endforeach
                <textarea class="survey__comment" name="comment{{$x}}" rows="4" cols="50" placeholder="Take your comment..."></textarea>
            @else
                <?php $answer_array = explode(',', $item->answer); ?>
                @foreach ($answer_array as $item)
                    <label class="survey__survey-answer"><input type="checkbox" name="checkAnswer{{$x}}[]" value="{{$item}}" /> {{ucfirst(trans($item))}} </label>
                @endforeach
                <textarea class="survey__comment" name="comment{{$x}}" rows="4" cols="50" placeholder="Take your comment..."></textarea>
            @endif
        @endforeach
        <div class="survey__btnDiv">
            {{-- <button class="survey__button--red">Back</button>
            <button class="survey__button">Next</button> --}}
            <button class="add-survey__button">Submit survey</button>
        </div>
    </form>
</div>



@endsection
