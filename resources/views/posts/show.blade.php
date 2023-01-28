<!-- inside view blade file -->

@trix($post, 'content')

{!! $post->trix('content') !!} //must use HasTrixRichText trait in order for $model->trix() method work

{!! app('laravel-trix')->make($post, 'content') !!}
