.. _match_lists:

###########
Match Lists
###########

Mach Lists are designed to group well known numbers or patterns in order to use
them in specific treatments.

Depending on the section used, this numbers can be matched with the origin or
the destination of the call, so be sure to use distinctive names for your match
lists.

For example, like mentioned in the previous section :ref:`external_filters`,
white and black lists contain one or more match lists. In this case, the
**origin** of the call will be matched against the list entries to determine if
the treatment of **skipping** the filter or **rejecting** the call will be applied.

.. note:: Match lists themselves have no behaviour associated, they only provide
    a common way for all process to determine if a number has a treatment.

.. attention:: Beware that numbers of a Match list are checked against origins
    or destinations depending on the configuration section that use them.


The section **Client configuration** > **Match Lists** allows to configure
different items that will group the numbers and patterns.

As shown in **List of Match List Patterns**, a match list can contain specific numbers or groups using
`Regular Expressions <http://php.net/manual/en/reference.pcre.pattern.syntax.php>`_

.. error:: **Regular expressions** of Match List patterns must be **in E.164** format and **plus symbol must be
               escaped** (e.g. ^\\+34 for all spanish numbers).
