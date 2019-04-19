

@if ($paginator->hasPages())
    <ul class="pagination justify-content-md-center">
                
                <div class="pull-left">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
<!--                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                               Previous 
                            </a>
                        </li>
-->
                    @else
                        <li class="page-item"><a class="page-link btn btn-success" href="{{ $paginator->previousPageUrl() }}" rel="prev">السؤال السابق</a></li>
                    @endif
                </div>
                <div class="pull-right" style="margin-left: 50px">
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item"><a class="page-link btn btn-success" href="{{ $paginator->nextPageUrl() }}" rel="next">السؤال التالى</a></li>
                    @else
<!--                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                Next 
                            </a>
                        </li>
-->
                    @endif
                </div>
    </ul>
@endif
