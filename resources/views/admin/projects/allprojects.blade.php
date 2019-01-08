@extends('layouts.admin')
@section('title', 'All Projects')


@section('content')


                {{-- projects --}}
                <div class="projects">
                    
                    <div class="row">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{ Session::get('success') }}
                        </div>
                        @endif
                        @foreach($projects as $project)
                        <div class="col-md-4">
                        <div class="card">
                                @if(!empty($project->images->first()))
                               
                                <img class="card-img-top" alt="Card image cap" src="{{ asset($project->images->first()->path) }}">
                                
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ $project->name }}</h4>
                                    <p><small>By {{ $project->user->name }} </small></p>
                                    <p><small>{{ date('M d , Y', $project->created_at->timestamp) }}</small></p>
                                    <p class="card-text">{{ $project->body ? mb_strimwidth($project->body, 0, 20, "...") : 'Nothing' }}</p>
                                    <hr>
                                    <p><strong>Categories:</strong>
                                    @if(!empty($project->categories->first()))
                                        @foreach($project->categories as $category)
                                        {{ $category->name }} {{ !$loop->last ? ',' : ''}}
                                        @endforeach
                                    @else
                                    Uncategorized
                                    @endif    
                                    </p>
                                    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                                </div>
                            </div>
                        </div>  {{-- col-lg --}}
                        @endforeach
                    </div>
                </div>
             {{-- ./projects --}}


@endsection