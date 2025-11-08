<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RoleResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Roles';
    protected static ?string $navigationGroup = 'User Management';

    // ✅ Navigation-এ দেখানোর অনুমতি
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
        return $user && in_array($user->role, ['admin', 'superadmin']);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),

            Forms\Components\Select::make('role')
                ->label('Role')
                ->options([
                    'user' => 'User',
                    'admin' => 'Admin',
                    'superadmin' => 'Super Admin',
                ])
                ->required()
                ->default('user')
                ->disabled(fn ($record) =>
                    auth()->user()?->role !== 'superadmin' &&
                    ($record?->role === 'superadmin')
                ),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('User Name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('role')->label('Role')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make()
                ->visible(fn ($record) =>
                    auth()->user()?->role === 'admin' ||
                    auth()->user()?->role === 'superadmin'
                ),
        ])
        ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
