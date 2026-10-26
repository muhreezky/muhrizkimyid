<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Experience;

use Orchid\Screen\Layout;

class ExperienceEditLayout extends Layout
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
            Input::make('experience.title')->title('Title')->required(),
            Input::make('experience.company')->title('Company')->required(),
            Input::make('experience.position')->title('Position')->required(),
            Input::make('experience.start_date')->title('Start Date')->required(),
            Input::make('experience.end_date')->title('End Date')->when($request->filled('experience.current'), fn () => fn () => 'Current')->help('Leave blank if this is your current position'),
            Input::make('experience.description')->title('Description')->type('textarea'),
        ];
    }
}