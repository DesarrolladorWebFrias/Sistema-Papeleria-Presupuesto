<div class="flex justify-center items-center">
    <a href="{{ route('presupuesto.show', $id) }}" class="flex sm:justify-right items-right mr-3 text-theme-1"> <i data-feather="file-plus" class="w-4 h-4 mr-1"></i> Mostrar </a>

    <a href="{{ route('presupuestostiquets.tiquet', $id) }}" class="flex items-center text-theme-6" > <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Generar tiquets </a>
</div>