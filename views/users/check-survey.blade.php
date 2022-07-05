@extends('main')

@section('content')

<div class="show">
    <div class="show__window">
        <div class="show__top">       
            <h2 class="show__top-title">{{ucfirst(trans($survey[0]->name))}}</h2>
        </div>
        <table class="show__table">
            <tr>
                <th>Question</th>
                <th>Answers</th>
            </tr>

            <?php $num=0;  ?>

            @foreach ($master[$num] as $item)
                <tr>
                    <td>{{ucfirst(trans($master[$num]["question$num"]))}}</td>
                    <td>
                        @foreach($master[$num]["answers$num"] as $item)
                            {{ucfirst(trans($item))}} <br>
                        @endforeach
                    </td>
                </tr>
                <?php $num++; ?>
            @endforeach
        </table>
    </div>
</div>

@endsection