@extends('front_end.layouts.app')

@section('content')
    <section>
        <div class="gap2 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row merged20" id="page-contents">

                            <div class="col-lg-3">
                                
                            </div><!-- sidebar -->

                            <div class="col-lg-6">
                                <div class="central-meta postbox">
                                    <span class="create-post">Update post</span>
                                    <div class="new-postbox">
                                        <figure>

                                            @if (Auth::user()->image == '')
                                             <img src="{{ asset('frontend/images\resources\paceholder1.jpg') }}" alt="user_image" width="40" height="40">
                                             
                                            @else
                                              <img src="{{ asset('storage/'.Auth::user()->image) }}"  alt="" width="40" height="40">  
                                            @endif

                                        </figure>
                                        <div class="newpst-input">
                                          
                                            <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                                             @method('PUT')
                                             @csrf
                                               
                                                <textarea id="post" rows="2" name="post" >{{ $post->post }}</textarea>
                                                {{-- <img src="{{ asset('storage/'.$post->image) }}"  alt="" width="200" height="">  --}}
                                                {{-- <input id="post" type="text" value="{{ $post->post }}" name="post" autocomplete="post" autofocus> --}}
                                                <br><br><br><br>
                                                <div class="attachments">
                                                    <ul>
                                                        <li>
        
                                                            <label class="fileContainer">
                                                                <i class="fa fa-music"></i>
                                                                <input type="file">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="fileContainer">
                                                                <i class="fa fa-image"></i>
                                                                <input type="file" id="image" name="image">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="fileContainer">
                                                                <i class="fa fa-video-camera"></i>
                                                                <input type="file">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="fileContainer">
                                                                <i class="fa fa-camera"></i>
                                                                <input type="file">
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button class="post-btn" type="submit" data-ripple="">Update</button>
                                            </form>
                                        </div>
                                        
                                        <div class="add-location-post">
                                            <span>Drag map point to selected area</span>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label class="control-label">Lat :</label>
                                                    <input type="text" class="" id="us3-lat">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Long :</label>
                                                    <input type="text" class="" id="us3-lon">
                                                </div>
                                            </div>
                                            <!-- map -->
                                            <div id="us3"></div>
                                        </div>

                                    </div>
                                </div><!-- add post new box -->

                                <div class="loadMore">
                                    @foreach ($posts->reverse() as $item)
                                    <div class="central-meta item">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>

                                                    @if ($item->user_image == '')
                                                    <img src="{{asset('frontend/images/resources/paceholder1.jpg')}}" alt="">
                                                   @else
                                                    <img src="{{ asset('storage/'.$item->user_image) }}" alt="" width="40" height="40"> 
                                                   @endif

                                                </figure>
                                                <div class="friend-name">
                                                    {{-- <div class="more">
                                                        @if (Auth::user()->id == $item->user_id)
                                                          <div class="more-post-optns"><i class="ti-more-alt"></i>
                                                                <ul>
                                                                    <li><a href="{{ route('post.edit',$item->id) }}"><i class="fa fa-pencil-square-o"></i>Edit Post</li>
                                                                    <li><a href="{{ route('post.delete',$item->id) }}"><i class="fa fa-trash-o"></i>Delete Post</a></li>
                                                                </ul>
                                                          </div>
                                                        @endif
                                                    </div> --}}
                                                    {{-- Auth::user()->name --}}
                                                    <ins><a href="time-line.html" title="">{{ \App\User::where('id', $item->user_id)->first()->name}}</a></ins>
                                                    <span>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                    {{-- published: jan,26 2021 19:PM --}}
                                                </div>

                                                <div class="post-meta">
                                                    <div class="description">
                                                        
                                                           <p>{{ $item->post }}</p>
                                                           <img src="{{ asset('storage/'.$item->image) }}"  alt="" width="300" height=""> 
                                                           
                                                    </div>

                                                    <div class="we-video-info">
                                                        <ul>
                                                            <li>
                                                                <div class="likes heart" title="Like/Dislike">❤ <span>2K</span></div>
                                                            </li>
                                                            <li>
																<span class="comment" title="Comments">
																	<i class="fa fa-commenting"></i>
																	<ins>52</ins>
																</span>
                                                            </li>

                                                            <li>
																<span>
																	<a class="share-pst" href="#" title="Share">
																		<i class="fa fa-share-alt"></i>
																	</a>
																	<ins>20</ins>
																</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="coment-area" style="">
                                                    <ul class="we-comet">
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="{{ asset('frontend/images\resources\nearly3.jpg') }}" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <h5><a href="time-line.html" title="">Sk Abu Hanif</a></h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae magni accusantium architecto hic earum ut, excepturi sint ullam unde voluptatem commodi reprehenderit praesentium! Nesciunt, eaque beatae. Perferendis eum illum iure?</p>
                                                               <!-- <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p> -->
                                                                <div class="inline-itms">
                                                                    <span>1 days ago</span>
                                                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                                    <a href="#" title=""><i class="fa fa-heart"></i><span>20</span></a>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="{{ asset('frontend/images\resources\comet-4.jpg') }}" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <h5><a href="time-line.html" title="">Jems Bond</a></h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae magni accusantium architecto hic earum ut, excepturi sint ullam unde voluptatem commodi reprehenderit praesentium! Nesciunt, eaque beatae. Perferendis eum illum iure?</p>
                                                                <!-- <p>we are working for the dance and sing songs. this video is very awesome for the youngster. -->
                                                                    <i class="em em-smiley"></i>
                                                                </p>
                                                                <div class="inline-itms">
                                                                    <span>1 days ago</span>
                                                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                                    <a href="#" title=""><i class="fa fa-heart"></i><span>20</span></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="" class="showmore underline">more comments+</a>
                                                        </li>
                                                        <li class="post-comment">
                                                            <div class="comet-avatar">
                                                                <img src="{{ asset('frontend/images\resources\nearly1.jpg') }}" alt="">
                                                            </div>
                                                            <div class="post-comt-box">
                                                                <form method="post">
                                                                    <textarea placeholder="Post your comment"></textarea>
                                                                    <div class="add-smiles">
                                                                        <div class="uploadimage">
                                                                            <i class="fa fa-image"></i>
                                                                            <label class="fileContainer">
                                                                                <input type="file">
                                                                            </label>
                                                                        </div>
                                                                        <span class="em em-expressionless" title="add icon"></span>
                                                                        <div class="smiles-bunch">
                                                                            <i class="em em---1"></i>
                                                                            <i class="em em-smiley"></i>
                                                                            <i class="em em-anguished"></i>
                                                                            <i class="em em-laughing"></i>
                                                                            <i class="em em-angry"></i>
                                                                            <i class="em em-astonished"></i>
                                                                            <i class="em em-blush"></i>
                                                                            <i class="em em-disappointed"></i>
                                                                            <i class="em em-worried"></i>
                                                                            <i class="em em-kissing_heart"></i>
                                                                            <i class="em em-rage"></i>
                                                                            <i class="em em-stuck_out_tongue"></i>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit"></button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- without image -->
                                    @endforeach
                                </div>

                            </div><!-- centerl meta -->

                            <div class="col-lg-3">
                            </div><!-- sidebar -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
