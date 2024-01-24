<x-master title="homepage">
    <main>
        <article>
            {{-- hero  --}}
            @include('sections.hero')
            
            {{-- upcoming  --}}
            @include('sections.upcoming')
            
            {{-- service  --}}
            @include('sections.service')
            
            {{-- toprated  --}}
            @include('sections.toprated')

            {{-- cta  --}}
            @include('sections.cta')
        </article>
    </main>
</x-master>