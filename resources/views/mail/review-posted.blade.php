<h3>{{$review->title}}</h3>
<p>
    Your review was posted on the website
</p>

<p>
    <a href="{{ url('/reviews/' . $review->id) }}">Link to your review</a>
</p>