
    @if(isset($recherche))
                
                @foreach($recherche as $article)
                
                <span onclick="window.location.href='{{url('/detail/'.$article->id)}}'" class="input-group-text d-flex" style="cursor: pointer; border-style: dotted;">
                    <img src='{{asset($article->photo)}}' style="width: 35px">
                    <span style="text-align: right;">&nbsp; {{ $article->nameP }}</span>

                    <span style="text-align: right;">&nbsp; {{ number_format($article->price, 2)  }} FCFA </span>
                </span>
                @endforeach 

             
   
    @endif