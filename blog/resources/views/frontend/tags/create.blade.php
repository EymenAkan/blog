@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content-wrapper">
                    <h2 class="mb-4">Create New Tag</h2>

                    <form method="POST" action="{{ route('tags.store') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Tag Name</label>
                            <input class="form-control form-control-lg"
                                   type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter tag name (e.g., Travel, Tech, Photography)"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="theme_color" class="form-label fw-semibold">Theme Color</label>
                            <p class="text-muted small mb-2">Choose a color that represents this tag. The website will adapt to this color when viewing posts with this tag.</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control form-control-color form-control-lg"
                                           type="color"
                                           name="theme_color"
                                           id="theme_color"
                                           value="{{ old('theme_color', '#6366f1') }}"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <div class="color-presets mt-2">
                                        <p class="small text-muted mb-2">Quick presets:</p>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button type="button" class="btn btn-sm color-preset" data-color="#ef4444" style="background-color: #ef4444; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#f97316" style="background-color: #f97316; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#eab308" style="background-color: #eab308; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#22c55e" style="background-color: #22c55e; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#06b6d4" style="background-color: #06b6d4; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#3b82f6" style="background-color: #3b82f6; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#8b5cf6" style="background-color: #8b5cf6; width: 30px; height: 30px; border-radius: 50%;"></button>
                                            <button type="button" class="btn btn-sm color-preset" data-color="#ec4899" style="background-color: #ec4899; width: 30px; height: 30px; border-radius: 50%;"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="color-preview mb-4">
                            <p class="fw-semibold mb-2">Preview:</p>
                            <div class="preview-card p-3 rounded" id="colorPreview">
                                <div class="preview-header p-2 rounded text-white mb-2">
                                    <strong>Sample Header</strong>
                                </div>
                                <div class="preview-content p-2 rounded">
                                    <span class="badge preview-badge">{{ old('name', 'Your Tag') }}</span>
                                    <p class="mb-0 mt-2 small">This is how your tag will look on the website</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>
                                Create Tag
                            </button>
                            <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary btn-lg">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .content-wrapper {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }

        .color-preset {
            border: 2px solid #e5e7eb !important;
            transition: all 0.2s ease;
        }

        .color-preset:hover {
            transform: scale(1.1);
            border-color: #374151 !important;
        }

        .preview-card {
            border: 2px dashed #d1d5db;
            background: #f9fafb;
        }

        .preview-header {
            background: var(--preview-color, #6366f1);
        }

        .preview-content {
            background: rgba(var(--preview-color-rgb, 99, 102, 241), 0.1);
        }

        .preview-badge {
            background: var(--preview-color, #6366f1);
            color: white;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorInput = document.getElementById('theme_color');
            const nameInput = document.getElementById('name');
            const previewCard = document.getElementById('colorPreview');
            const colorPresets = document.querySelectorAll('.color-preset');

            function updatePreview() {
                const color = colorInput.value;
                const name = nameInput.value || 'Your Tag';

                // Convert hex to RGB
                const r = parseInt(color.substr(1, 2), 16);
                const g = parseInt(color.substr(3, 2), 16);
                const b = parseInt(color.substr(5, 2), 16);

                document.documentElement.style.setProperty('--preview-color', color);
                document.documentElement.style.setProperty('--preview-color-rgb', `${r}, ${g}, ${b}`);

                // Update badge text
                const badge = previewCard.querySelector('.preview-badge');
                if (badge) badge.textContent = name;
            }

            colorInput.addEventListener('input', updatePreview);
            nameInput.addEventListener('input', updatePreview);

            colorPresets.forEach(preset => {
                preset.addEventListener('click', function() {
                    colorInput.value = this.dataset.color;
                    updatePreview();
                });
            });

            // Initial preview
            updatePreview();
        });
    </script>
@endpush
