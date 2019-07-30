@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="card card-width">
        <div class="card-body">
            <h3 class="card-title"><a href="{{ $product->link_url }}">{{ $product->title }}</a></h3>
            <div class="card-text">
                <img src="{{ $product->images }}" class="img-responsive" style="width: 100%">
            </div>
            @if($product->type_price == 'promo')
            <h2>Promo Sale</h2>
            <h4 class="card-title">
                <span>{{ $product->special_price }}</span> 
                <span style="text-decoration:line-through">{{ $product->old_price }}</span>
            </h4>
            @else($product->type_price == 'flat')
            <h4 class="card-title">{{ $product->price }}</h4>
            @endif
            <div class="card-text">
                <p>Description: </p>
                <p>{{ $product->description }}</p>
                <p><a href="{{ $product->link_url }}" class="btn btn-warning">Source</a></p>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Comments ({{ count($product->comments) }})</h4>
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('product.comment.store', [$product->id]) }}">
                                @csrf
                                <div class="input-group">
                                <textarea type="text" class="form-control" name="comment"  placeholder="Please insert your comments"></textarea>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-comment" type="button"><i class="fa fa-arrow-circle-right fa-fw"></i> Submit</button>
                                </span>
                            </div>

                               
                            </form>
                        </div>
                        <!-- Grid column -->
                    </div>
                    @if(!empty($product->comments))
                        @foreach($product->comments()->latest()->get() AS $comment)
                            <div class="list-group">
                                <div class="list-group-item comment-item">
                                <div class="comment-title">{{ $comment->comment }}</div>
                                    <div class="comment-date">
                                        <small class="text-muted">{{ $comment->created_at }}</small>
                                    </div>
                                    <div class="text-center">
                                        <form method="POST" action="{{ route('product.comment.upvote', [$product->id, $comment->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary btn-rounded btn-sm"><i class="fa fa-thumbs-up fa-sm pr-2" aria-hidden="true"></i>({{ $comment->comment_votes()->upvote()->count() }})</button>
                                        </form>
                                        <form method="POST" action="{{ route('product.comment.downvote', [$product->id, $comment->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary btn-rounded btn-sm"><i class="fa fa-thumbs-down fa-sm pr-2" aria-hidden="true"></i>({{ $comment->comment_votes()->downvote()->count() }})</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


