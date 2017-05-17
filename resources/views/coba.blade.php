<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/styles/monokai-sublime.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	

	<pre><code class="php">
		public function index()
    {
    	$slide1 = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->take(2)->skip(0)->get();
    	$slide2 = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->take(3)->skip(3)->get();
    	$post = Post::where('is_publish', 1)->orderBy('created_at', 'DESC')->paginate(10);
    	return view('front.d-blog.index', compact('slide1', 'slide2', 'post'));
    }
	</code></pre>