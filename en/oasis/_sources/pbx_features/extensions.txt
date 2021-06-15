##########
Extensions
##########

The base configuration includes 2 extensions (101 and 102) that route directly
to *Alice* and *Bob*, so we had almost nothing to do with the section 
**Company configuration** > **Extensions**. 

.. note:: **An extensions is**, by definition, **an internal number with an
   assigned logic**.   

.. rubric:: Create a new extension

The new extension window looks like this:

.. image:: img/extension_add.png

.. glossary::

    Number
        The number that must be dialed by the internal user that will trigger
        the configured logic. It must have a minimum length of 2 and must be 
        a number.

    Route
        This select will allow us to choose the logic that will use this
        extension when is dialed from an internal user. Depending on the selected
        route, and additional select or input will be shown to select the
        hungroup, conference room, user, etc.

.. warning:: If an extension has a number that conflicts with an external
   number, this external number will be masked and, in practice, will be
   unavailable for the whole company. 
