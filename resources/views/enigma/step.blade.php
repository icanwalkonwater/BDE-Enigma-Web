@extends('layouts.app')

@section('content')
    <div class="container-large my-20">

        <!-- Title -->
        <h1 class="text-4xl">
            <a href="{{ route('enigma.show', ['id' => $enigma->id]) }}"><i class="material-icons container-center-hv btn green-dark">arrow_back</i></a>
            {{ $enigma->name }} - {{ $step->name }}
        </h1>

        <p class="separator"></p>

        @if (substr($step->content, 0, 2) === '!!')
            @component(substr($step->content, 2), ['enigma' => $enigma, 'step' => $step, 'completed' => $completed])
            @endcomponent
        @else
            <p class="description">
                {{ $step->content }}
            </p>
        @endif

        <h2 class="mt-16 text-3xl">
            Votre r&eacute;ponse ?
        </h2>

        <br>

        @unless ($completed)
            <form action="{{ route('enigma.step.confirm', [$enigma->id, $step->step]) }}" method="post"
                  class="w-full lg:w-2/3">
                @csrf

                <input id="solution" type="text" name="solution" placeholder="Solution" value="{{ old('solution') }}"
                       class="input-text {{ $errors->has('solution') ? 'red' : 'blue' }}" required>

                @if ($errors->has('solution'))
                    <label for="solution" class="text-red float-right mt-2">
                        Mauvaise r&eacute;ponse !
                    </label>
                @endif

                <br><br>

                <input type="submit" value="Valider" class="btn blue-dark">
            </form>
        @else
            <p class="alert blue">
                Vous avez d&eacute;j&agrave; compl&eacute;t&eacute; cette &eacute;tape !
            </p>
        @endunless

    </div>
@endsection
