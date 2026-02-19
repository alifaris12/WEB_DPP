@if ($paginator->hasPages())
    <nav class="pagination-nav" role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="pagination-btn pagination-btn-disabled" aria-disabled="true" aria-label="Previous">
                        ‹
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn" rel="prev" aria-label="Previous">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="pagination-btn pagination-btn-dots" aria-disabled="true">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="pagination-btn pagination-btn-active" aria-current="page">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="pagination-btn" aria-label="Go to page {{ $page }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn" rel="next" aria-label="Next">
                        ›
                    </a>
                </li>
            @else
                <li>
                    <span class="pagination-btn pagination-btn-disabled" aria-disabled="true" aria-label="Next">
                        ›
                    </span>
                </li>
            @endif
        </ul>
    </nav>

    <style>
        .pagination-nav {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pagination-list {
            display: flex;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 0;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 4px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .pagination-list li {
            margin: 0;
        }
        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
            background: transparent;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .pagination-btn:hover:not(.pagination-btn-disabled):not(.pagination-btn-active) {
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(8, 145, 178, 0.3);
        }
        .pagination-btn-active {
            background: linear-gradient(135deg, #ff9a56, #ff8c00) !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
            cursor: default;
        }
        .pagination-btn-disabled {
            color: #9ca3af;
            cursor: not-allowed;
            pointer-events: none;
            opacity: 0.5;
        }
        .pagination-btn-dots {
            color: #6b7280;
            cursor: default;
        }
        @media (max-width: 768px) {
            .pagination-btn {
                min-width: 36px;
                height: 36px;
                padding: 0 10px;
                font-size: 13px;
            }
        }
    </style>
@endif
