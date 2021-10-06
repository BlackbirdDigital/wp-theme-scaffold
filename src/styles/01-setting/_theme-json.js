const theme = require('../../../theme.json');

const colors = theme.settings.color.palette.reduce((acc, c) => {
	acc[c.slug] = c.color;
	return acc;
}, {});

module.exports = {
	colors,
};
