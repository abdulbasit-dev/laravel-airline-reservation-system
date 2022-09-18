@extends('layouts.master')

@section('title') @lang('translation.Buttons') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Buttons @endslot
@endcomponent

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default Buttons</h4>
                <p class="card-title-desc">Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light">Secondary</button>
                    <button type="button" class="btn btn-success waves-effect waves-light">Success</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Info</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light">Warning</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Danger</button>
                    <button type="button" class="btn btn-dark waves-effect waves-light">Dark</button>
                    <button type="button" class="btn btn-link waves-effect">Link</button>
                    <button type="button" class="btn btn-light waves-effect">Light</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Outline Buttons</h4>
                <p class="card-title-desc">Replace the default modifier classes with the <code class="highlighter-rouge">.btn-outline-*</code> ones to remove all background images and colors on any button.</p>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                    <button type="button" class="btn btn-outline-secondary waves-effect">Secondary</button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light">Success</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light">Info</button>
                    <button type="button" class="btn btn-outline-warning waves-effect waves-light">Warning</button>
                    <button type="button" class="btn btn-outline-danger waves-effect waves-light">Danger</button>
                    <button type="button" class="btn btn-outline-dark waves-effect waves-light">Dark</button>
                    <button type="button" class="btn btn-outline-light waves-effect">Light</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rounded Buttons</h4>
                <p class="card-title-desc">Use class <code>.btn-rounded</code> for button round border.</p>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Primary</button>
                    <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light">Secondary</button>
                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Success</button>
                    <button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Info</button>
                    <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light">Warning</button>
                    <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Danger</button>
                    <button type="button" class="btn btn-dark btn-rounded waves-effect waves-light">Dark</button>
                    <button type="button" class="btn btn-link btn-rounded waves-effect">Link</button>
                    <button type="button" class="btn btn-light btn-rounded waves-effect">Light</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buttons with icon</h4>
                <p class="card-title-desc">Add icon in button.</p>

                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-smile font-size-16 align-middle me-2"></i> Primary
                    </button>
                    <button type="button" class="btn btn-success waves-effect waves-light">
                        <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Success
                    </button>
                    <button type="button" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-error font-size-16 align-middle me-2"></i> Warning
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">
                        <i class="bx bx-block font-size-16 align-middle me-2"></i> Danger
                    </button>
                    <button type="button" class="btn btn-dark waves-effect waves-light">
                        <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Loading
                    </button>
                    <button type="button" class="btn btn-light waves-effect">
                        <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i> Loading
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Snip Buttons</h4>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="mt-4">
                            <h5 class="font-size-15 mb-3">Example 1</h5>

                            <div>
                                <div class="btn-group btn-group-example mb-3" role="group">
                                    <button type="button" class="btn btn-outline-primary w-sm">Left</button>
                                    <button type="button" class="btn btn-outline-primary w-sm">Middle</button>
                                    <button type="button" class="btn btn-outline-primary w-sm">Right</button>
                                </div>

                                <div>
                                    <div class="btn-group btn-group-example mb-3" role="group">
                                        <button type="button" class="btn btn-primary w-xs"><i class="mdi mdi-thumb-up"></i></button>
                                        <button type="button" class="btn btn-danger w-xs"><i class="mdi mdi-thumb-down"></i></button>
                                    </div>
                                </div>

                                <div>
                                    <div class="btn-group btn-group-example" role="group">
                                        <button type="button" class="btn btn-outline-secondary w-xs"><i class="bx bx-menu-alt-right"></i></button>
                                        <button type="button" class="btn btn-outline-secondary w-xs"><i class="bx bx-menu"></i></button>
                                        <button type="button" class="btn btn-outline-secondary w-xs"><i class="bx bx-menu-alt-left"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="mt-4">
                            <h5 class="font-size-15 mb-3">Example 2</h5>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-smile label-icon"></i> Primary</button>
                                <button type="button" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bx-check-double label-icon"></i> Success</button>
                                <button type="button" class="btn btn-warning waves-effect btn-label waves-light"><i class="bx bx-error label-icon "></i> Warning</button>
                                <button type="button" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-block label-icon "></i> Danger</button>
                                <button type="button" class="btn btn-dark waves-effect btn-label waves-light"><i class="bx bx-loader label-icon "></i> Dark</button>
                                <button type="button" class="btn btn-light waves-effect btn-label waves-light"><i class="bx bx-hourglass label-icon "></i> Light</button>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="mt-4">
                            <h5 class="font-size-15 mb-3">Example 3</h5>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary waves-effect waves-light w-sm">
                                    <i class="mdi mdi-download d-block font-size-16"></i> Download
                                </button>
                                <button type="button" class="btn btn-light waves-effect waves-light w-sm">
                                    <i class="mdi mdi-upload d-block font-size-16"></i> Upload
                                </button>
                                <button type="button" class="btn btn-success waves-effect waves-light w-sm">
                                    <i class="mdi mdi-pencil d-block font-size-16"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger waves-effect waves-light w-sm">
                                    <i class="mdi mdi-trash-can d-block font-size-16"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buttons Sizes</h4>
                <p class="card-title-desc">Add <code>.btn-lg</code> or <code>.btn-sm</code> for additional sizes.
                </p>

                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Large button</button>
                    <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light">Large button</button>
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Small button</button>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Small button</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buttons width</h4>
                <p class="card-title-desc">Add <code>.w-xs</code>, <code>.w-sm</code>, <code>.w-md</code> and <code> .w-lg</code> class for additional buttons width.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary w-xs waves-effect waves-light">Xs</button>
                    <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Small</button>
                    <button type="button" class="btn btn-warning w-md waves-effect waves-light">Medium</button>
                    <button type="button" class="btn btn-success w-lg waves-effect waves-light">Large</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Button tags</h4>
                <p class="card-title-desc">The <code class="highlighter-rouge">.btn</code>
                    classes are designed to be used with the <code class="highlighter-rouge">&lt;button&gt;</code> element.
                    However, you can also use these classes on <code class="highlighter-rouge">&lt;a&gt;</code> or <code class="highlighter-rouge">&lt;input&gt;</code> elements (though
                    some browsers may apply a slightly different rendering).</p>

                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-primary waves-effect waves-light" href="#" role="button">Link</a>
                    <button class="btn btn-success waves-effect waves-light" type="submit">Button</button>
                    <input class="btn btn-info" type="button" value="Input">
                    <input class="btn btn-danger" type="submit" value="Submit">
                    <input class="btn btn-warning" type="reset" value="Reset">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Toggle states</h4>
                <p class="card-title-desc">Add <code class="highlighter-rouge">data-bs-toggle="button"</code>
                    to toggle a button’s <code class="highlighter-rouge">active</code>
                    state. If you’re pre-toggling a button, you must manually add the <code class="highlighter-rouge">.active</code> class
                    <strong>and</strong> <code class="highlighter-rouge">aria-pressed="true"</code> to the
                    <code class="highlighter-rouge">&lt;button&gt;</code>.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                    <button type="button" class="btn btn-primary active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                    <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Block Buttons</h4>
                <p class="card-title-desc">Create block level buttons—those that
                    span the full width of a parent—by adding <code class="highlighter-rouge">.btn-block</code>.</p>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Block level button</button>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Block level button</button>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Checkbox & Radio Buttons</h4>
                <p class="card-title-desc">Create button-like checkboxes and radio buttons by using <code>.btn</code> styles rather than <code>.form-check-label</code> on the <code>&lt;label&gt;</code> elements.</p>

                <div class="d-flex flex-wrap gap-2">
                    <div>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" checked>
                                <label class="btn btn-primary" for="btncheck1">Checkbox 1</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-primary" for="btncheck2">Checkbox 2</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-primary" for="btncheck3">Checkbox 3</label>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btncheck4">Checkbox 4</label>

                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck5">Checkbox 5</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck6">Checkbox 6</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-secondary" for="btnradio1">Radio 1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-secondary" for="btnradio2">Radio 2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-secondary" for="btnradio3">Radio 3</label>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary" for="btnradio4">Radio 4</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradio5">Radio 5</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradio6">Radio 6</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Button group</h4>
                <p class="card-title-desc">Wrap a series of buttons with <code class="highlighter-rouge">.btn</code> in <code class="highlighter-rouge">.btn-group</code>.</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-wrap gap-2">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary">Left</button>
                                <button type="button" class="btn btn-primary">Middle</button>
                                <button type="button" class="btn btn-primary">Right</button>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="javascript:void(0);" class="btn btn-outline-primary active" aria-current="page">Left</a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary">Middle</a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary">Right</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap gap-3 mt-4 mt-md-0">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary"><i class="bx bx-menu-alt-right"></i></button>
                                <button type="button" class="btn btn-secondary"><i class="bx bx-menu"></i></button>
                                <button type="button" class="btn btn-secondary"><i class="bx bx-menu-alt-left"></i></button>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-secondary"><i class="bx bx-menu-alt-right"></i></button>
                                <button type="button" class="btn btn-outline-secondary"><i class="bx bx-menu"></i></button>
                                <button type="button" class="btn btn-outline-secondary"><i class="bx bx-menu-alt-left"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Button Toolbar</h4>
                <p class="card-title-desc">Combine sets of button groups into
                    button toolbars for more complex components. Use utility classes as
                    needed to space out groups, buttons, and more.</p>

                <div class="d-flex flex-wrap gap-4">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <button type="button" class="btn btn-secondary">1</button>
                            <button type="button" class="btn btn-secondary">2</button>
                            <button type="button" class="btn btn-secondary">3</button>
                            <button type="button" class="btn btn-secondary">4</button>
                        </div>
                        <div class="btn-group me-2" role="group" aria-label="Second group">
                            <button type="button" class="btn btn-secondary">5</button>
                            <button type="button" class="btn btn-secondary">6</button>
                            <button type="button" class="btn btn-secondary">7</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Third group">
                            <button type="button" class="btn btn-secondary">8</button>
                        </div>
                    </div>

                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">2</button>
                            <button type="button" class="btn btn-outline-secondary">3</button>
                            <button type="button" class="btn btn-outline-secondary">4</button>
                        </div>
                        <div class="btn-group me-2" role="group" aria-label="Second group">
                            <button type="button" class="btn btn-outline-secondary">5</button>
                            <button type="button" class="btn btn-outline-secondary">6</button>
                            <button type="button" class="btn btn-outline-secondary">7</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Third group">
                            <button type="button" class="btn btn-outline-secondary">8</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Sizing</h4>
                <p class="card-title-desc">Instead of applying button sizing
                    classes to every button in a group, just add <code class="highlighter-rouge">.btn-group-*</code> to each <code class="highlighter-rouge">.btn-group</code>, including each one
                    when nesting multiple groups.</p>

                <div class="d-flex flex-wrap gap-3">
                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Left</button>
                        <button type="button" class="btn btn-primary">Middle</button>
                        <button type="button" class="btn btn-primary">Right</button>
                    </div>

                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary">Left</button>
                        <button type="button" class="btn btn-outline-primary">Middle</button>
                        <button type="button" class="btn btn-outline-primary">Right</button>
                    </div>
                </div>

                <br />

                <div class="d-flex flex-wrap gap-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Left</button>
                        <button type="button" class="btn btn-secondary">Middle</button>
                        <button type="button" class="btn btn-secondary">Right</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary">Left</button>
                        <button type="button" class="btn btn-outline-secondary">Middle</button>
                        <button type="button" class="btn btn-outline-secondary">Right</button>
                    </div>
                </div>

                <br />

                <div class="d-flex flex-wrap gap-3">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger">Left</button>
                        <button type="button" class="btn btn-danger">Middle</button>
                        <button type="button" class="btn btn-danger">Right</button>
                    </div>

                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-danger">Left</button>
                        <button type="button" class="btn btn-outline-danger">Middle</button>
                        <button type="button" class="btn btn-outline-danger">Right</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Vertical variation</h4>
                <p class="card-title-desc">Make a set of buttons appear vertically
                    stacked rather than horizontally. Split button dropdowns are not
                    supported here.</p>

                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                        <button type="button" class="btn btn-secondary">Button</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                <a class="dropdown-item" href="#">Dropdown link</a>
                                <a class="dropdown-item" href="#">Dropdown link</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary">Button</button>
                        <button type="button" class="btn btn-secondary">Button</button>
                    </div>

                    <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
                        <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked="">
                        <label class="btn btn-outline-danger" for="vbtn-radio1">Radio 1</label>
                        <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
                        <label class="btn btn-outline-danger" for="vbtn-radio2">Radio 2</label>
                        <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
                        <label class="btn btn-outline-danger" for="vbtn-radio3">Radio 3</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection