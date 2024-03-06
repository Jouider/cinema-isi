<x-master title="homepage">
    <main>
        <article>
            {{-- hero  --}}
            @include('sections.hero')

            @include('sections.currently')
            
            {{-- upcoming  --}}
            @include('sections.upcoming')
        
            
            
        </article>
    </main>
</x-master>