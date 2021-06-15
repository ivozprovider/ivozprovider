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
**origin** of the call will be matched agains the list entries to determime if
the treatment of **skipping** the filter or **rejecting** the call will be applied.

.. note:: Match lists themselfs have no behaviour associated, they only provide
    a common way for all process to determine if a number has a treatment.

.. attention:: Beware that numbers of a Match list are checked against origins
    or destinations depending on the configuration section that use them.


The section **Company configuration** > **Match Lists** allows to configure
different items that will group the numbers and patterns.

The screen displayed to the company administrator looks like this:

.. ifconfig:: language == 'en'

    .. image:: img/en/matchlist_add.png
      :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/matchlist_add.png
      :align: center

After creating a new Match list, you can include numbers and patterns.

.. ifconfig:: language == 'en'

    .. image:: img/en/matchlist_patterns_add.png
      :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/matchlist_patterns_add.png
      :align: center

As shown, the match list can contain specific numbers or groups using
`Regular Expressions <http://php.net/manual/en/reference.pcre.pattern.syntax.php>`_