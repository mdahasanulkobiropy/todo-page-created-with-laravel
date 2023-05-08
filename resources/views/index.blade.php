<!DOCTYPE html>
@foreach ($themetoggole as $theme)
    @if ($theme->themestatus == 1)
        <html lang="en" class=" dark-layout">
    @else
        <html lang="en">
    @endif
@endforeach

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Site Title -->
	<title>Todo Page</title>
	<!-- All CSS -->
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

	@foreach ($themetoggole as $theme)

        @if ($theme->themestatus == 1)
            <a href="{{route('themesatutsfalse.theme', $theme->id)}}" type="button" class="theme-toggler d-inline-flex align-items-center position-fixed border-0">
                <i data-feather="circle" class="mr-2"></i>
                Toggle Theme
            </a>
        @else
            <a href="{{route('themesatutstrue.theme', $theme->id)}}" type="button" class="theme-toggler d-inline-flex align-items-center position-fixed border-0">
                <i data-feather="circle" class="mr-2"></i>
                Toggle Theme
            </a>
        @endif

    @endforeach



	<!-- Start Page Main Contents Section -->
	<main class="main py-5 my-5">


        @if(session()->has('message'))
            <span>
                <div  class="alert alert-success text-center"> {{ session()->get('message') }}</div>
            </span>
        @endif
        @if(session()->has('storeMessage'))
            <span>
                <div  class="alert alert-success text-center"> {{ session()->get('storeMessage') }}</div>
            </span>
        @endif
		<div class="main__container w-100 mx-auto">
			<div class="row">
				<div class="col-12">
					<div class="main__wrapper d-flex position-relative overflow-hidden">
						<div class="main__aside--closer"></div>
						<aside class="main__aside">
							<div class="main__aside__header">
								<button type="button" id="addTaskButton" class="primary-btn w-100" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
							</div>
							<div class="main__aside__body custom-scrollbar">
								<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link d-inline-flex align-items-center active" id="v-pills-aside-tab-1" data-toggle="pill" href="#v-pills-asideTab-1" role="tab" aria-controls="v-pills-asideTab-1" aria-selected="true">
										<i data-feather="mail" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">My Task</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-2" data-toggle="pill" href="#v-pills-asideTab-2" role="tab" aria-controls="v-pills-asideTab-2" aria-selected="false">
										<i data-feather="star" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Important</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-3" data-toggle="pill" href="#v-pills-asideTab-3" role="tab" aria-controls="v-pills-asideTab-3" aria-selected="false">
										<i data-feather="check" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Completed</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-4" data-toggle="pill" href="#v-pills-asideTab-4" role="tab" aria-controls="v-pills-asideTab-4" aria-selected="false">
										<i data-feather="trash" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Deleted</span>
									</a>
								</div>
								<div class="main__aside__body__tags-card mt-5">
									<div class="main__aside__body__tags-card__header d-flex align-items-center justify-content-between mb-2">
										<h4 class="main__aside__body__tags-card__header__title text-muted text-uppercase mb-0">Tags</h4>
										<button data-toggle="modal" data-target="#addTagsModal" class="main__aside__body__tags-card__header__add-btn btn d-inline-flex align-items-center shadow-none bg-transparent border-0">
											<i data-feather="plus"></i>
										</button>
									</div>
									<ul class="main__aside__body__tags-card__list bigbutton">
										<li class="main__aside__body__tags-card__list__item">
											@foreach ($tags as $tag)
                                                <button type="button" class="show-tag-btn bg-transparent border-0 w-100">
                                                    <span style="display: inline-block;
                                                    width: 0.71429rem;
                                                    height: 0.71429rem;
                                                    border-radius: 50%;
                                                    background-color: {{$tag->color}};
                                                    margin-right: 1.07143rem;"></span>
                                                    {{-- <span style="color: {{$tag->color}}"></span> --}}
                                                    {{$tag->name}}
                                                </button>
                                            @endforeach
										</li>
										{{-- <li class="main__aside__body__tags-card__list__item">
											<button type="button" class="show-tag-btn show-tag-btn--success bg-transparent border-0 w-100">
												<span class="show-tag-btn__color"></span>
												Low
											</button>
										</li>
										<li class="main__aside__body__tags-card__list__item">
											<button type="button" class="show-tag-btn show-tag-btn--warning bg-transparent border-0 w-100">
												<span class="show-tag-btn__color"></span>
												Medium
											</button>
										</li>
										<li class="main__aside__body__tags-card__list__item">
											<button type="button" class="show-tag-btn show-tag-btn--danger bg-transparent border-0 w-100">
												<span class="show-tag-btn__color"></span>
												High
											</button>
										</li>
										<li class="main__aside__body__tags-card__list__item">
											<button type="button" class="show-tag-btn show-tag-btn--info bg-transparent border-0 w-100">
												<span class="show-tag-btn__color"></span>
												Update
											</button>
										</li> --}}
									</ul>
								</div>
							</div>
						</aside>
						<div class="main__content w-100">
							<div class="main__content__header d-flex">
								<button type="button" class="main__aside__toggler bg-transparent border-0">
									<i data-feather="menu"></i>
								</button>
								<form action="javascript:void(0)" class="main__content__search-form d-flex flex-row-reverse w-100">
									<input type="search" id="task-search-control" class="main__content__search-form__control w-100 bg-transparent border-0 pl-0" placeholder="Search Task">
									<button type="submit" class="main__content__search-form__btn d-inline-flex align-items-center justify-content-center text-muted bg-transparent border-0">
										<i data-feather="search"></i>
									</button>
								</form>
								<div class="dropdown custom-dropdown">
									<button class="btn dropdown-toggle bg-transparent border-0 shadow-none" type="button" id="mainContentDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i data-feather="more-vertical"></i>
									</button>
									<ul class="dropdown-menu border-0 mt-0" aria-labelledby="mainContentDropdownMenuButton">
										<li class="dropdown-item bg-transparent p-0">
											<button type="button" id="sortA-Z" class="dropdown-link w-100 text-left border-0">Sort  A - Z</button>
										</li>
										<li class="dropdown-item bg-transparent p-0">
											<button type="button" id="sortZ-A" class="dropdown-link w-100 text-left border-0">Sort  Z - A</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="main__content__body custom-scrollbar overflow-hidden">
								<div class="tab-content" id="v-pills-tabContent">
									<div class="tab-pane fade show active" id="v-pills-asideTab-1" role="tabpanel" aria-labelledby="v-pills-aside-tab-1">
										<ul class="main__content__list mb-0">
											@foreach ($tasks as $task)
                                               @if ($task->cstatus==0 && $task->imstatus==0)
                                                    <li class="main__content__list__item">
                                                        <span><a href="{{route('important.task',$task->id)}}">  <i class="fa-regular fa-star task-checkbox m-0" style="border:1px solid "></i></a></span>
                                                        <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal{{$task->id}}">
                                                            <div class="main__content__list__item__content d-flex align-items-center">
                                                                <h4 class="main__content__list__item__content__title mb-0">{{$task->title}}</h4>
                                                            </div>
                                                            <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                                <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                                @foreach ($task->getTag as $tag_task)
                                                                    <li>
                                                                        <span class="badge"  style="color:{{$tag_task->getTagName->color}};" >{{$tag_task->getTagName->name}}</span>
                                                                    </li>
                                                                @endforeach
                                                                    {{-- <li>
                                                                        <span class="badge badge-pill badge--success">Low</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="badge badge-pill badge--warning">Medium</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="badge badge-pill badge--danger">High</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="badge badge-pill badge--info">Update</span>
                                                                    </li> --}}
                                                                </ul>
                                                                <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                                <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                @foreach ($task->getUser as $task_user)
                                                                    <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip"          data-placement="top" data-original-title="{{$task_user->getUserName->name}}">
                                                                        <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-2.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                        </a>
                                                                @endforeach
                                                                    {{-- <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
                                                                        <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                    </a>
                                                                    <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
                                                                        <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-4.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                    </a>
                                                                    <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
                                                                        <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-7.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                    </a>
                                                                    <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">A</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                               @endif



                                                <!-- Update Task Modal -->
                                                <div class="modal task-modal fade updatemodalfortask"  id="updateTaskModal{{$task->id}}" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog m-0 w-100 h-100 position-fixed">
                                                        <div class="modal-content border-0 rounded-0 h-100">
                                                            <div class="modal-header border-0 rounded-0">
                                                                <a href="{{route('complete.task',$task->id)}}" type="button" class="btn-outline btn-outline--secondary btn-sm">Mark Complete</a>
                                                                <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body custom-scrollbar">
                                                                <form action="{{route('update.task',$task->id)}}" method="POST" class="task-modal__form needs-validation" novalidate>
                                                                    @csrf
                                                                    <div class="form-group" id="updateidfortask">

                                                                        <input type="hidden" name="updated_id" value="{{ $task->id }}">
                                                                        <label for="title" class="form-group-label">Title*</label>
                                                                        <input type="text" id="title" name="uptitle" class="form-control bg-transparent" value="{{$task->title}}">
                                                                        <div class="invalid-feedback"> </div>

                                                                        @if($errors->has('uptitle'))
                                                                            <span>
                                                                                <strong  class="text-danger">{{ $errors->first('uptitle') }}</strong>
                                                                            </span>
                                                                         @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="task-assigned" class="form-group-label d-block">Assignee*</label>
                                                                        <select name="upuser_id[]" class="show-tag-btn__color custom-select form-control bg-transparent task-assigned" data-placeholder="Assignee Name" multiple="multiple">
                                                                           @foreach ($users as $user)
                                                                           <option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-1.jpg"{{$task->getUser()->where('user_id', $user->id)->exists() ? 'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                                                           @endforeach
                                                                        </select>
                                                                        @if($errors->has('upuser_id'))
                                                                            <span>
                                                                                <strong class="text-danger">{{ $errors->first('upuser_id') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="dueDate" class="form-group-label">Due Date*</label>
                                                                        <input type="date" min="{{ now()->addDay() }}" id="dueDate" name="updueDate" class="form-control bg-transparent" value="{{$task->dueDate}}" >
                                                                        @if($errors->has('updueDate'))
                                                                            <span>
                                                                                <strong  class="text-danger">{{ $errors->first('updueDate') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="task-tags" class="form-group-label d-block">Tags</label>
                                                                        <select name="uptag_id[]" class="show-tag-btn__color custom-select form-control bg-transparent task-tags" multiple="multiple">
                                                                            @foreach ($tags as $tag)
                                                                            <option {{$task->getTag()->where('tag_id', $tag->id)->exists() ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if($errors->has('uptag_id'))
                                                                            <span>
                                                                                <strong  class="text-danger">{{ $errors->first('uptag_id') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="description" class="form-group-label">Description*</label>
                                                                        <textarea name="updescription" id="description" class="form-control form-control--textarea bg-transparent">{{$task->description}}</textarea>
                                                                    </div>
                                                                    @if($errors->has('updescription'))
                                                                        <span>
                                                                            <strong  class="text-danger">{{ $errors->first('updescription') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                    <div>
                                                                        <button type="submit" id="taskupdatebutton" value="{{$task->id}}" class="primary-btn mr-3">Update</button>
                                                                        <a href="{{route('delete.task',$task->id)}}"class="btn-outline btn-outline--danger">Delete</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Update Task Modal -->

                                                @endforeach
											{{-- <li class="main__content__list__item">
												<input type="checkbox" name="" id="main__content__list__item-2" class="task-checkbox">
												<div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
													<div class="main__content__list__item__content d-flex align-items-center">
														<label for="main__content__list__item-2" class="task-checkbox-label mb-0"></label>
														<h4 class="main__content__list__item__content__title mb-0">Plan a party for development team 🎁</h4>
													</div>
													<div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
														<ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
															<li>
																<span class="badge badge-pill badge--warning">Medium</span>
															</li>
															<li>
																<span class="badge badge-pill badge--danger">High</span>
															</li>
															<li>
																<span class="badge badge-pill badge--info">Update</span>
															</li>
														</ul>
														<small class="main__content__list__item__actions__time text-muted mr-3">Jan 12</small>
														<div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-2.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
														</div>
													</div>
												</div>
											</li>
											<li class="main__content__list__item">
												<input type="checkbox" name="" id="main__content__list__item-3" class="task-checkbox">
												<div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
													<div class="main__content__list__item__content d-flex align-items-center">
														<label for="main__content__list__item-3" class="task-checkbox-label mb-0"></label>
														<h4 class="main__content__list__item__content__title mb-0">Hire 5 new Fresher or Experienced, frontend and backend developers </h4>
													</div>
													<div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
														<ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
															<li>
																<span class="badge badge-pill badge--danger">High</span>
															</li>
															<li>
																<span class="badge badge-pill badge--info">Update</span>
															</li>
														</ul>
														<small class="main__content__list__item__actions__time text-muted mr-3">Jun 17</small>
														<div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
															<!--  -->
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-4.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-7.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
														</div>
													</div>
												</div>
											</li>
											<li class="main__content__list__item">
												<input type="checkbox" name="" id="main__content__list__item-4" class="task-checkbox">
												<div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
													<div class="main__content__list__item__content d-flex align-items-center">
														<label for="main__content__list__item-4" class="task-checkbox-label mb-0"></label>
														<h4 class="main__content__list__item__content__title mb-0">Skype Tommy for project status & report</h4>
													</div>
													<div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
														<ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
															<li>
																<span class="badge badge-pill badge--info">Update</span>
															</li>
														</ul>
														<small class="main__content__list__item__actions__time text-muted mr-3">Jan 12</small>
														<div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-4.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">
																<img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-7.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
															</a>
															<a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="User">A</a>
														</div>
													</div>
												</div>
											</li> --}}
										</ul>
										<div class="main__content__no-results">
											<h5 class="main__content__no-results__text text-center mb-0">No Items Found</h5>
										</div>
									</div>
                                    {{-- This part for complete section part show  --}}

									<div class="tab-pane fade" id="v-pills-asideTab-2" role="tabpanel" aria-labelledby="v-pills-aside-tab-2">
                                        <ul class="main__content__list mb-0">
                                            @foreach ($tasks as $task)
                                                @if ($task->imstatus == 1)
                                                    <li class="main__content__list__item">
                                                        <span class="text-warning"><a href="{{route('unimportant.task',$task->id)}}"> <i class="fa-regular fa-star task-checkbox m-0" style="border:1px solid "></i></a></span>
                                                        <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
                                                            <div class="main__content__list__item__content d-flex align-items-center">
                                                                <label for="main__content__list__item-3" class="mb-0"></label>
                                                                <h4 class="main__content__list__item__content__title mb-0">{{$task->title}}</h4>
                                                            </div>
                                                            <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                                <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                                    @foreach ($task->getTag as $tag)
                                                                        <li>
                                                                        <span class="badge badge-pill badge--danger">{{$tag->getTagName->name}}</span>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                                <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                                <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                    <!--  -->
                                                                    @foreach ($task->getUser as $user)
                                                                        <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                                                                            <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                        </a>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                         </ul>

                                    </div>
									<div class="tab-pane fade" id="v-pills-asideTab-3" role="tabpanel" aria-labelledby="v-pills-aside-tab-3">
                                        <ul class="main__content__list mb-0">
                                           @foreach ($tasks as $task)
                                                @if ($task->cstatus == 1)
                                                    <li class="main__content__list__item">
                                                        <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
                                                            <div class="main__content__list__item__content d-flex align-items-center">

                                                                <h4 class="main__content__list__item__content__title mb-0">{{$task->title}} </h4>
                                                            </div>
                                                            <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                                <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                                @foreach ($task->getTag as $tag)
                                                                        <li>
                                                                            <span class="badge badge-pill badge--danger">{{$tag->getTagName->name}}</span>
                                                                        </li>
                                                                @endforeach

                                                                </ul>
                                                                <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                                <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                    <!--  -->
                                                                    @foreach ($task->getUser as $user)
                                                                        <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                                                                            <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                        </a>
                                                                    @endforeach

                                                                </div>
                                                                <span class="ml-5"><a class="btn" href="{{route('incomplete.task',$task->id)}}">Incomplete</a></span>
                                                            </div>

                                                        </div>
                                                    </li>
                                                @endif
                                           @endforeach
                                        </ul>
                                    </div>
									<div class="tab-pane fade" id="v-pills-asideTab-4" role="tabpanel" aria-labelledby="v-pills-aside-tab-4">
                                        <ul class="main__content__list mb-0">
                                           @foreach ($trashs as $trash)
                                                <li class="main__content__list__item">
                                                    <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
                                                        <div class="main__content__list__item__content d-flex align-items-center">
                                                            <label for="main__content__list__item-3" class="mb-0"></label>
                                                            <h4 class="main__content__list__item__content__title mb-0">{{$trash->title}}</h4>
                                                        </div>
                                                        <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                            <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                               @foreach ($trash->getTag as $tag)
                                                                    <li>
                                                                    <span class="badge badge-pill badge--danger">{{$tag->getTagName->name}}</span>
                                                                    </li>
                                                               @endforeach

                                                            </ul>
                                                            <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                            <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                <!--  -->
                                                                @foreach ($trash->getUser as $user)
                                                                    <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                                                                        <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                    </a>
                                                                @endforeach
                                                                <span class="ml-5"><a href="{{route('restore.task',$trash->id)}}">Restore</a></span>
                                                                <span class="ml-3"><a href="{{route('forcedelete.task',$trash->id)}}">Delete</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                           @endforeach
                                        </ul>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- End Page Main Contents Section -->

	{{-- <!-- Update Task Modal -->
	<div class="modal task-modal fade" id="updateTaskModal" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
		<div class="modal-dialog m-0 w-100 h-100 position-fixed">
			<div class="modal-content border-0 rounded-0 h-100">
				<div class="modal-header border-0 rounded-0">
					<button type="button" class="btn-outline btn-outline--secondary btn-sm">Mark Complete</button>
					<button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body custom-scrollbar">
					<form action="#!" class="task-modal__form needs-validation" novalidate>
						<div class="form-group">
							<label for="title" class="form-group-label">Title</label>
							<input type="text" id="title" name="title" class="form-control bg-transparent" placeholder="Title" required>
							<div class="invalid-feedback">This field is required.</div>
						</div>
						<div class="form-group">
							<label for="task-assigned" class="form-group-label d-block">Assignee</label>
							<select name="assignee" class="custom-select form-control bg-transparent task-assigned" data-placeholder="Assignee Name" multiple="multiple">
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-1.jpg" value="Phill Buffer">Phill Buffer</option>
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-2.jpg" value="Chandler Bing">Chandler Bing</option>
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" value="Ross Geller">Ross Geller</option>
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-4.jpg" value="Monica Geller">Monica Geller</option>
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-5.jpg" value="Joey Tribbiani">Joey Tribbiani</option>
								<option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-6.jpg" value="Rachel Green">Rachel Green</option>
							</select>
						</div>
						<div class="form-group">
							<label for="dueDate" class="form-group-label">Due Date</label>
							<input type="date" id="dueDate" name="dueDate" class="  form-control bg-transparent" placeholder="Due Date" required>
						</div>
						<div class="form-group">
							<label for="task-tags" class="form-group-label d-block">Tags</label>
							<select id="task-tags" name="tags" class="custom-select form-control bg-transparent task-tags" data-placeholder="Add Tags" multiple="multiple">
								<option value="Team">Team</option>
								<option value="Low">Low</option>
								<option value="Medium">Medium</option>
								<option value="High">High</option>
								<option value="Update">Update</option>
							</select>
						</div>
						<div class="form-group">
							<label for="description" class="form-group-label">Description</label>
							<textarea name="description" id="description" class="form-control form-control--textarea bg-transparent" placeholder="Write Your Description"></textarea>
						</div>
						<div>
							<button type="submit" class="primary-btn mr-3">Update</button>
							<button type="button" class="btn-outline btn-outline--danger" data-dismiss="modal">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Update Task Modal --> --}}

	<!-- Add Task Modal -->
	<div class="modal task-modal fade" id="addTaskModal" aria-labelledby="addTaskModalLabel" aria-hidden="true">
		<div class="modal-dialog m-0 w-100 h-100 position-fixed">
			<div class="modal-content border-0 rounded-0 h-100">
				<div class="modal-header align-items-center border-0 rounded-0">
					<h3 class="modal-header__title mb-0">Add Task</h3>
					<button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body custom-scrollbar">
					<form id="addTaskForm" action="{{route('store.task')}}" method="POST" class="task-modal__form needs-validation" novalidate>
                        @csrf
						<div class="form-group">
							<label for="title" class="form-group-label">Title*</label>
							<input type="text" id="title" value="{{old('title')}}" name="title" class="form-control bg-transparent" placeholder="Title">
						</div>
                        @if($errors->has('title'))
                            <span>
                                <strong id="text-danger" class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

						<div class="form-group">
							<label for="task-assigned--add" class="form-group-label d-block">Assignee*</label>

							<select id="task-assigned--add" name="user_id[]" class="custom-select form-control bg-transparent task-assigned"  data-placeholder="Assignee Name" multiple="multiple" >
							@foreach ($users as $user)
                                 {{-- <option value="{{ $user->id }}" {{ (collect(old('user_id'))->contains($user->id)) ? 'selected':'' }}>{{ $user->name }}</option> --}}
                                 <option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-1.jpg" {{ (collect(old('user_id'))->contains($user->id)) ? 'selected':'' }} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
							</select>
                            @if($errors->has('user_id'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group">
							<label for="dueDate" class="form-group-label">Due Date*</label>
							<input type="date" min="{{ now()->addDay()->format('Y-m-d') }}" value="{{old('dueDate')}}"  id="dueDate" name="dueDate" class="form-control bg-transparent"   placeholder="Due Date" >
						</div>

                        @if($errors->has('dueDate'))
                            <span>
                                <strong class="text-danger">{{ $errors->first('dueDate') }}</strong>
                            </span>
                        @endif

						<div class="form-group">
							<label for="task-tags--add" class="form-group-label d-block">Tags*</label>
							<select id="task-tags--add" name="tag_id[]" class="custom-select form-control bg-transparent task-tags" data-placeholder="Add Tags" multiple="multiple">
								@foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" {{ (collect(old('tag_id'))->contains($tag->id)) ? 'selected':'' }} >{{$tag->name}}</option>
                                @endforeach
							</select>
                            @if($errors->has('tag_id'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('tag_id') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group">
							<label for="description" class="form-group-label">Description*</label>
							<textarea name="description" value="{{old('description')}}" id="description" class="form-control form-control--textarea bg-transparent" placeholder="Write Your Description">{{ old('description') }}</textarea>

                            @if($errors->has('description'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
						</div>
						<div>
							<button type="submit" id="addtaskbutton" class="primary-btn mr-3 ">Add</button>
							<button type="button" class="btn-outline btn-outline--danger" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Add Task Modal -->

	<!-- Add Tags Modal -->
	<div class="modal task-modal fade" id="addTagsModal" aria-labelledby="addTagsModalLabel" aria-hidden="true">
		<div class="modal-dialog m-0 w-100 h-100 position-fixed">
			<div class="modal-content border-0 rounded-0 h-100">
				<div class="modal-header align-items-center border-0 rounded-0">
					<h3 class="modal-header__title mb-0">Add Tags</h3>
					<button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>task
				</div>
				<div class="modal-body custom-scrollbar">
					<form action="{{route('store.tag')}}" method="POST" class="task-modal__form needs-validation" novalidate>
                        @csrf
						<div class="form-group">
							<label for="addTag" class="form-group-label">Tag Name</label>
							<input type="text" id="addTag" name="name" class="form-control bg-transparent" placeholder="Tag Name" required>
							<label for="addTagColor" class="form-group-label">Tag Name Color</label>
							<input type="color" id="addTagColor" name="color" class="form-control bg-transparent" placeholder="Tag Name Color" required>

							<div class="invalid-feedback">This field is required.</div>
						</div>
						<div>
							<button type="submit" class="primary-btn mr-3">Add</button>
							<button type="button" class="btn-outline btn-outline--danger" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Tags Task Modal -->



    {{-- <div id="display-success">The error Message</div> --}}

	<!-- All Scripts -->
	<script src="{{asset('frontend')}}./assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/feather/js/feather.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/flatpickr/js/flatpickr.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/select2/js/select2.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
	<script src="{{asset('frontend')}}./assets/js/script.js"></script>

    <script>
        document.querySelectorAll('input[type=date]').forEach(e => {
            flatpickr(e, {
                minDate: e.getAttribute('min'),
                maxDate: e.getAttribute('max'),
                defaultDate: e.getAttribute('value'),
                altFormat: 'j-m-Y',
                dateFormat: 'Y-m-d',
                allowInput: true,
                altInput: true,
                onReady: (selectedDates, dateStr, instance) => {
                    const mainInputDataId = instance.input.dataset.id;
                    const altInput = instance.input.parentElement?.querySelector(".input");
                    altInput.setAttribute("onkeypress", "return false");
                    altInput.setAttribute("onpaste", "return false");
                    altInput.setAttribute("autocomplete", "off");
                    altInput.setAttribute("id", mainInputDataId);
                },
            });
        });

        $(document).ready(function(){


            @if($errors->has('uptitle')||$errors->has('upuser_id')||$errors->has('uptag_id') || $errors->has('updueDate') || $errors->has('updescription') )
                $('#updateTaskModal'+'{{ old("updated_id") }}').modal('show');

                $(document).on("click",".updatemodalfortask ",function () {
                    $('.text-danger').fadeOut();
                    $('.alert-success').fadeOut();
                });
            @endif

            @if($errors->has('title')||$errors->has('user_id')||$errors->has('tag_id') || $errors->has('dueDate') || $errors->has('description'))
                $('#addTaskModal').modal('show');
                $(document).on("click","#addTaskButton ",function () {
                    $('.text-danger').fadeOut();
                });
            @endif

            $(document).on("click",".updatemodalfortask ",function () {
               $('.alert-success').fadeOut();
            });
            $(document).on("click","#addTaskButton", function () {
               $('.alert-success').fadeOut();
            });

        })



    </script>


</body>
</html>
