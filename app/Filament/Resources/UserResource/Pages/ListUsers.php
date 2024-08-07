<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'admins' => Tab::make()
                ->modifyQueryUsing(
                    fn (Builder $query) => $query->role('Admin')
                ),
            'managers' => Tab::make()
                ->modifyQueryUsing(
                    fn (Builder $query) => $query->role('Manager')
                ),
            'executives' => Tab::make()
                ->modifyQueryUsing(
                    fn (Builder $query) => $query->role('Executive')
                ),
        ];
    }
}
