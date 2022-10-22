<div >
    <style>
 video {
    width: 100%;
    height: 552px;
}
div#my-video{
    width: 100%;
    height: 552px;
}

    </style>

      <video
      id="my-video"
      class="video-js"
      controls
      preload="auto"
      width="640"
      height="264"
      poster="MY_VIDEO_POSTER.jpg"
      data-setup="{}"
      class="video-js vjs-theme-city"
    >
      <source  src="{{ Storage::url('videos/' . $video->video) }}"  type="video/mp4" />
      <source   type="video/webm" />
      <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank"
          >supports HTML5 video</a
        >
      </p>
    </video>

      @push("scripts")
      <script src="https://vjs.zencdn.net/7.20.2/video.min.js"></script>

      @endpush

</div>
