@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a Button widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Button widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Button" from the "1" select of "main_content" slot
        Then I should see "Widget (Button)"
        And I should see "1" quantum
        When I fill in "_a_static_widget_button[title]" with "My Button Widget title"
        And I fill in "_a_static_widget_button[icon]" with "fa-calendar"
        And I fill in "_a_static_widget_button[hoverTitle]" with "My Button Widget hover"
        And I select "Large" from "_a_static_widget_button[size]"
        And I select "Warning" from "_a_static_widget_button[style]"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Button Widget title"
        And I should see a button "My Button Widget title" with class "btn-lg"
        And I should see a button "My Button Widget title" with class "btn-warning"
        And I should see a button "My Button Widget title" with hover title "My Button Widget hover"
        And I should see a button "My Button Widget title" with a "fa-calendar" icon

    Scenario: I can update a Button widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetButton:
            | widgetMap | title                 | icon     | hoverTitle                  | size | style  |
            | home      | Button Widget to edit | fa-truck | Button Widget to edit hover | md   | danger |
        When I reload the page
        Then I should see "Button Widget to edit"
        And I should see a button "Button Widget to edit" with class "btn-md"
        And I should see a button "Button Widget to edit" with class "btn-danger"
        And I should see a button "Button Widget to edit" with hover title "Button Widget to edit hover"
        And I should see a button "Button Widget to edit" with a "fa-truck" icon
        When I switch to "edit" mode
        And I edit the "Button" widget
        And I should see "1" quantum
        When I fill in "_a_static_widget_button[title]" with "Button Widget modified"
        And I fill in "_a_static_widget_button[icon]" with "fa-pencil"
        And I fill in "_a_static_widget_button[hoverTitle]" with "Button Widget modified hover"
        And I select "Tiny" from "_a_static_widget_button[size]"
        And I select "Success" from "_a_static_widget_button[style]"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "Button Widget modified"
        And I should see a button "Button Widget modified" with class "btn-sm"
        And I should see a button "Button Widget modified" with class "btn-success"
        And I should see a button "Button Widget modified" with hover title "Button Widget modified hover"
        And I should see a button "Button Widget modified" with a "fa-pencil" icon