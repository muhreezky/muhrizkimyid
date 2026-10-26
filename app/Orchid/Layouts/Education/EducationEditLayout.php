<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Education;
use Orchid\Screen\Layout;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Input;

class EducationEditLayout extends Layout
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
    public function build(Repository $repository)
    {
        return [
            Input::make('education.institution')->title('Institution')->required(),
            Input::make('education.degree')->title('Degree')->required(),
            Input::make('education.field_of_study')->title('Field of Study')->help('Optional'),
            Input::make('education.start_date')->title('Start Date')->required(),
            Input::make('education.end_date')->title('End Date')->when(fn($value) => !empty($value), fn() => 'Current')->help('Leave blank if still studying'),
            Input::make('education.description')->title('Description')->type('textarea'),
        ];
    }
}