<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Project;

use Orchid\Screen\Layout;

class ProjectEditLayout extends Layout
{
    /** @var string */
    public $layout = 'fields';

    /**     * Allow or deny access to this layout for the current user.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**     * Build the layout.
     */
    public function build(): iterable
    {
        return [
            Input::make('project.title')->title('Title')->required(),
            Input::make('project.description')->title('Description')->type('textarea'),
            Input::make('project.technologies')->title('Technologies')->type('textarea')->help('Comma-separated list'),
            Input::make('project.link')->title('Link')->help('Portfolio project URL'),
            Input::make('project.image')->title('Image')->help('Project thumbnail URL'),
        ];
    }
}