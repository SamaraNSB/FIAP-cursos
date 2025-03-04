@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        {{-- Versão mobile --}}
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Link "Anterior" --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link border-danger text-danger" style="background-color: transparent;">
                            {{ __('pagination.previous') }}
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link border-danger text-danger" style="background-color: transparent;"
                           href="{{ $paginator->previousPageUrl() }}" rel="prev">
                           {{ __('pagination.previous') }}
                        </a>
                    </li>
                @endif

                {{-- Link "Próxima" --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link border-danger text-danger" style="background-color: transparent;"
                           href="{{ $paginator->nextPageUrl() }}" rel="next">
                           {{ __('pagination.next') }}
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link border-danger text-danger" style="background-color: transparent;">
                            {{ __('pagination.next') }}
                        </span>
                    </li>
                @endif
            </ul>
        </div>

        {{-- Versão para telas maiores --}}
        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('pagination.showing_to_of', [
                        'first' => $paginator->firstItem(),
                        'last'  => $paginator->lastItem(),
                        'total' => $paginator->total(),
                    ]) !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Link "Anterior" --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="page-link border-danger text-danger" style="background-color: transparent;" aria-hidden="true">
                                &lsaquo;
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link border-danger text-danger" style="background-color: transparent;"
                               href="{{ $paginator->previousPageUrl() }}"
                               rel="prev"
                               aria-label="{{ __('pagination.previous') }}">
                               &lsaquo;
                            </a>
                        </li>
                    @endif

                    {{-- Elementos de paginação --}}
                    @foreach ($elements as $element)
                        {{-- Separador "..." --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link border-danger text-danger" style="background-color: transparent;">
                                    {{ $element }}
                                </span>
                            </li>
                        @endif

                        {{-- Links individuais --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    {{-- Página atual: fundo vermelho --}}
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link bg-danger text-white border-danger">
                                            {{ $page }}
                                        </span>
                                    </li>
                                @else
                                    {{-- Demais páginas: apenas borda vermelha e texto vermelho --}}
                                    <li class="page-item">
                                        <a class="page-link border-danger text-danger" style="background-color: transparent;" href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Link "Próxima" --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link border-danger text-danger" style="background-color: transparent;"
                               href="{{ $paginator->nextPageUrl() }}"
                               rel="next"
                               aria-label="{{ __('pagination.next') }}">
                               &rsaquo;
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="page-link border-danger text-danger" style="background-color: transparent;" aria-hidden="true">
                                &rsaquo;
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
