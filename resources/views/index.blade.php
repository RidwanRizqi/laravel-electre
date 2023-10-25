<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="antialiased">
<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                Matriks X
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
             aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($criterias as $criteria)
                                <th>{{ $criteria->criteria }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($criterias as $criteria)
                                    <td>
                                        @foreach ($evaluations as $evaluation)
                                            @if ($evaluation->id_alternative == $alternative->id_alternative && $evaluation->id_criteria == $criteria->id_criteria)
                                                {{ $evaluation->value }}
                                            @endif
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                Matrix R
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($criterias as $criteria)
                                <th>{{ $criteria->criteria }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($criterias as $critKey => $criteria)
                                    <td>{{ $normalizedMatrix[$altKey][$critKey] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                Matrix V
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($criterias as $criteria)
                                <th>{{ $criteria->criteria }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($criterias as $critKey => $criteria)
                                    <td>{{ $weightedMatrix[$altKey][$critKey] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseFour">
                Matrix Concordance
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($alternatives as $alternative)
                                <th>{{ $alternative->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($alternatives as $altKey2 => $alternative2)
                                    <td>{{ $concordanceMatrix[$altKey][$altKey2] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseFive">
                Matrix Discordance
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingFive">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($alternatives as $alternative)
                                <th>{{ $alternative->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($alternatives as $altKey2 => $alternative2)
                                    <td>{{ $discordanceMatrix[$altKey][$altKey2] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseSix">
                Matrix Concordance
            </button>
        </h2>
        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingSix">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($alternatives as $alternative)
                                <th>{{ $alternative->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($alternatives as $altKey2 => $alternative2)
                                    <td>{{ $concordanceMatrix[$altKey][$altKey2] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseSeven">
                Matrix Discordance
            </button>
        </h2>
        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingSeven">
            <div class="accordion-body">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($alternatives as $alternative)
                                <th>{{ $alternative->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alternatives as $altKey => $alternative)
                            <tr>
                                <td>{{ $alternative->name }}</td>
                                @foreach ($alternatives as $altKey2 => $alternative2)
                                    <td>{{ $discordanceMatrix[$altKey][$altKey2] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
